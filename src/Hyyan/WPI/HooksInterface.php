<?php

/**
 * This file is part of the hyyan/woo-poly-integration plugin.
 * (c) Hyyan Abo Fakher <tiribthea4hyyan@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Hyyan\WPI;

/**
 * Plugin Hooks Interface
 *
 * @author Hyyan
 */
interface HooksInterface
{
    /**
     * Product Meta Sync Filter
     *
     * The filter is fired before product meta array is passed to polylang
     * to handle sync.
     *
     * The filter receive one parameter which is the meta array
     *
     * for instance :
     * <code>
     * add_filter(Hyyan\WPI\HooksInterface::PRODUCT_META_SYNC_FILTER,function($meta=array()) {
     *
     *      // do whatever you want
     *
     *      return $meta;
     * });
     * </code>
     */
    const PRODUCT_META_SYNC_FILTER = 'woo-poly.product.metaSync';

    /**
     * Fields Locker Selectors Filter
     *
     * The filter will be fired when the fields locker builds its selectors list
     * allowing other plugins to extend this list
     *
     * for instance :
     * <code>
     * add_filter(HooksInterface::FIELDS_LOCKER_SELECTORS_FILTER,function($selectors=array()) {
     *
     *      $selectors[] = '.my_field_to_lock';
     *
     *      return $selectors;
     * });
     */
    const FIELDS_LOCKER_SELECTORS_FILTER = 'woo-poly.fieldsLockerSelectors';

    /**
     * Product Sync Category Custom Fields Action
     *
     * The action will be fired when the plugin attemps to sync default product
     * category custom fields (dispplay_type,thumbinal_id)
     *
     * The action can be used to update extra custom fields if they exist
     *
     * for instance :
     * <code>
     *
     * add_action(
     *      HooksInterface::PRODUCT_SYNC_CATEGORY_CUSTOM_FIELDS,
     *      function (\Hyyan\WPI\Taxonomies $tax , $termID) {
     *
     *        if (isset($_POST['my_field_name'])) {
     *            $tax->doSyncProductCatCustomFields(
     *                      $termID
     *                     , 'my_field_name'
     *                     , esc_attr($_POST['my_field_name'])
     *             );
     *        }
     *
     *      }
     * );
     * </code>
     */
    const PRODUCT_SYNC_CATEGORY_CUSTOM_FIELDS = 'woo-poly.product.syncCategoryCustomFields';

    /**
     * Product Copy Category Custom Fields
     *
     * The action is fired when new translatin is being added for product category
     *
     * The action can be used to copy catefory custom fields from give category
     * ID to its transation
     *
     * for instance :
     *
     * <code>
     * add_action(HooksInterface::PRODUCT_COPY_CATEGORY_CUSTOM_FIELDS,function ($categoryID) {
     *
     *        // do whatever you want here
     * });
     * </code>
     */
    const PRODUCT_COPY_CATEGORY_CUSTOM_FIELDS = 'woo-poly.product.copyCategoryCustomFields';

    /**
     * Pages List
     *
     * The filter id fired before the list of woocommerce page names are passed
     * to ploylang in order to handle their translation
     *
     * for instance :
     * <code>
     * add_filter(Hyyan\WPI\HooksInterface::PAGES_LIST,function (array $pages) {
     *
     *      // do whatever you want
     *      $pages [] = 'shop';
     *
     *      return $pages;
     * });
     * </code>
     */
    const PAGES_LIST = 'woo-poly.pages.list';

    /**
     * Settings Sections Filter
     *
     * The filter is fired when settings section are being built, to ler other
     * plugins add their own sections
     *
     * for instance :
     * <code>
     * add_filter(HooksInterface::SETTINGS_SECTIONS_FILTER,function (array $sections) {
     *
     *      // Add your section
     *
     *      return $sections;
     * });
     * </code>
     */
    const SETTINGS_SECTIONS_FILTER = 'woo-poly.settings.sections';

    /**
     * Settings Fields Filter
     *
     * The filter is fired when settings fields are being built, to ler other
     * plugins add their own fields
     *
     * for instance :
     * <code>
     * add_filter(HooksInterface::SETTINGS_SECTIONS_FIELDS,function (array $fields) {
     *
     *      // Add your fields
     *
     *      return $fields;
     * });
     * </code>
     */
    const SETTINGS_SECTIONS_FIELDS = 'woo-poly.settings.fields';

}
