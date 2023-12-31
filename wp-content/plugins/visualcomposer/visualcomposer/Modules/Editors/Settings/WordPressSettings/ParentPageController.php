<?php

namespace VisualComposer\Modules\Editors\Settings\WordPressSettings;

if (!defined('ABSPATH')) {
    header('Status: 403 Forbidden');
    header('HTTP/1.1 403 Forbidden');
    exit;
}

use VisualComposer\Framework\Container;
use VisualComposer\Framework\Illuminate\Support\Module;
use VisualComposer\Helpers\PostType;
use VisualComposer\Helpers\Request;
use VisualComposer\Helpers\Traits\EventsFilters;
use VisualComposer\Helpers\Traits\WpFiltersActions;

class ParentPageController extends Container implements Module
{
    use WpFiltersActions;
    use EventsFilters;

    public function __construct()
    {
        $this->addFilter(
            'vcv:ajax:dropdown:parentPage:updateList:adminNonce',
            'getPageListForUpdate',
            11
        );
        $this->addFilter(
            'vcv:dataAjax:setData',
            'setData'
        );
        $this->addFilter(
            'vcv:frontend:head:extraOutput',
            'outputPageList'
        );
    }

    /**
     * Get page list
     *
     * @return array|false[]
     */
    protected function getPageList()
    {
        $requestHelper = vchelper('Request');
        $postTypeHelper = vchelper('PostType');
        $currentPost = $postTypeHelper->get();

        $currentParentPage = 'none';
        $pages[] = ['label' => __('None', 'visualcomposer'), 'value' => 'none'];
        $postQuery = [
            // @codingStandardsIgnoreLine
            'post_type' => $currentPost->post_type,
            'posts_per_page' => -1,
            'orderby' => 'title',
            'order' => 'ASC'
        ];

        // Set source id for ajax requests
        if (!$currentPost && $requestHelper->exists('vcv-source-id')) {
            $sourceId = $requestHelper->input('vcv-source-id');
            $currentPost = $postTypeHelper->get($sourceId);
        }

        // Exclude current post
        if ($currentPost) {
            $postQuery['post__not_in'][] = $currentPost->ID;
        }

        // Get all pages except current page
        $posts = $postTypeHelper->query($postQuery);
        foreach ($posts as $post) {
            /** @var \WP_Post $post */
            // @codingStandardsIgnoreStart
            $pages[] = [
                'label' => $post->post_title,
                'id' => $post->ID,
                'value' => (string)$post->ID,
                'parent' => $post->post_parent
            ];
            // @codingStandardsIgnoreEnd
        }

        // @codingStandardsIgnoreLine
        if (isset($currentPost->post_parent) && $currentPost->post_parent !== 0) {
            // @codingStandardsIgnoreLine
            $currentParentPage = (string)$currentPost->post_parent;
        }

        return [
            'current' => $currentParentPage,
            'all' => count($pages) > 0 ? $pages : false,
        ];
    }

    /**
     * @param $response
     *
     * @return mixed
     */
    protected function outputPageList(
        $response
    ) {
        if (!$this->isPageSupportPageAttributes()) {
            return $response;
        }

        $parentId = wp_get_post_parent_id(get_the_ID());
        if ($parentId) {
            $pageList = ["current" => $parentId, "all" => [
                ['label' => __('None', 'visualcomposer'), "value" => "none"],
                [
                    'label' => get_the_title($parentId),
                    "value" => $parentId,
                    "id" => $parentId,
                    "parent" => 0
                ]],
            ];
        } else {
            $pageList = ["current" => "none", "all" => [['label' => __('None', 'visualcomposer'), "value" => "none"]]];
        }

        $response = array_merge(
            $response,
            [
                vcview(
                    'partials/variableTypes/variable',
                    [
                        'key' => 'VCV_PAGE_LIST',
                        'value' => $pageList,
                    ]
                ),
            ]
        );
        return $response;
    }


    /**
     * Check if current page support page attributes.
     *
     * @return bool
     */
    protected function isPageSupportPageAttributes()
    {
        $postTypeHelper = vchelper('PostType');
        $currentPost = $postTypeHelper->get();

        // @codingStandardsIgnoreLine
        if (!isset($currentPost->post_type)) {
            return false;
        }

        // @codingStandardsIgnoreLine
        return post_type_supports($currentPost->post_type, 'page-attributes');
    }

    /**
     * @return array
     */
    protected function getPageListForUpdate()
    {
        $parent = get_post_parent();

        $pageList = $this->getPageList();
        $result = ['status' => true, 'data' => $pageList['all']];

        if (!empty($parent->ID)) {
            $result['current'] = $parent->ID;
        }

        return $result;
    }

    /**
     * Set parent page
     *
     * @param $response
     * @param $payload
     * @param \VisualComposer\Helpers\Request $requestHelper
     *
     * @return mixed
     */
    protected function setData($response, $payload, Request $requestHelper)
    {
        $currentPageId = $payload['sourceId'];
        // Do not update post if `post_parent` is missing or not set
        if ($requestHelper->exists('vcv-settings-parent-page')) {
            $postParent = $requestHelper->input('vcv-settings-parent-page');
            if (!empty($postParent)) {
                if ('none' === $postParent) {
                    $postParent = 0;
                }

                wp_update_post(['ID' => $currentPageId, 'post_parent' => $postParent]);
            }
        }

        return $response;
    }
}
