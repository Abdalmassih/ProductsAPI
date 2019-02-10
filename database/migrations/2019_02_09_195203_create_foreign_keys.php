<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateForeignKeys extends Migration
{

    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->foreign('set_id')->references('id')->on('sets')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
        Schema::table('price_info', function (Blueprint $table) {
            $table->foreign('product_id')->references('id')->on('products')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
        Schema::table('quantity_info', function (Blueprint $table) {
            $table->foreign('product_id')->references('id')->on('products')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
        Schema::table('price_specials', function (Blueprint $table) {
            $table->foreign('product_id')->references('id')->on('products')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
        Schema::table('memberships', function (Blueprint $table) {
            $table->foreign('member_id')->references('id')->on('members')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
        Schema::table('memberships', function (Blueprint $table) {
            $table->foreign('member_group_id')->references('id')->on('members_groups')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
        Schema::table('price_groups', function (Blueprint $table) {
            $table->foreign('members_group_id')->references('id')->on('members_groups')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
        Schema::table('price_groups', function (Blueprint $table) {
            $table->foreign('product_store_id')->references('id')->on('product_store')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
        Schema::table('product_category', function (Blueprint $table) {
            $table->foreign('product_id')->references('id')->on('products')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
        Schema::table('product_category', function (Blueprint $table) {
            $table->foreign('category_id')->references('id')->on('categories')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
        Schema::table('product_store', function (Blueprint $table) {
            $table->foreign('product_id')->references('id')->on('products')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
        Schema::table('product_store', function (Blueprint $table) {
            $table->foreign('store_id')->references('id')->on('stores')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
        Schema::table('medias', function (Blueprint $table) {
            $table->foreign('product_id')->references('id')->on('products')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
        Schema::table('product_brand', function (Blueprint $table) {
            $table->foreign('product_id')->references('id')->on('products')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
        Schema::table('product_brand', function (Blueprint $table) {
            $table->foreign('brand_id')->references('id')->on('brands')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
        Schema::table('product_tag', function (Blueprint $table) {
            $table->foreign('product_id')->references('id')->on('products')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
        Schema::table('product_tag', function (Blueprint $table) {
            $table->foreign('tag_id')->references('id')->on('tags')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
        Schema::table('files', function (Blueprint $table) {
            $table->foreign('product_id')->references('id')->on('products')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });

        Schema::table('related_products', function (Blueprint $table) {
            $table->foreign('first_product_id')->references('id')->on('products')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
        Schema::table('related_products', function (Blueprint $table) {
            $table->foreign('second_product_id')->references('id')->on('products')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
        Schema::table('similar_products', function (Blueprint $table) {
            $table->foreign('first_product_id')->references('id')->on('products')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
        Schema::table('similar_products', function (Blueprint $table) {
            $table->foreign('second_product_id')->references('id')->on('products')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
        Schema::table('product_supplier', function (Blueprint $table) {
            $table->foreign('product_id')->references('id')->on('products')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
        Schema::table('product_supplier', function (Blueprint $table) {
            $table->foreign('supplier_id')->references('id')->on('suppliers')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
        Schema::table('product_display', function (Blueprint $table) {
            $table->foreign('product_id')->references('id')->on('products')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
        Schema::table('product_display', function (Blueprint $table) {
            $table->foreign('display_id')->references('id')->on('displays')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign('products_set_id_foreign');
        });
        Schema::table('price_info', function (Blueprint $table) {
            $table->dropForeign('price_info_product_id_foreign');
        });
        Schema::table('quantity_info', function (Blueprint $table) {
            $table->dropForeign('quantity_info_product_id_foreign');
        });
        Schema::table('price_specials', function (Blueprint $table) {
            $table->dropForeign('price_specials_product_id_foreign');
        });
        Schema::table('memberships', function (Blueprint $table) {
            $table->dropForeign('memberships_member_id_foreign');
        });
        Schema::table('memberships', function (Blueprint $table) {
            $table->dropForeign('memberships_member_group_id_foreign');
        });
        Schema::table('price_groups', function (Blueprint $table) {
            $table->dropForeign('price_groups_members_group_id_foreign');
        });
        Schema::table('price_groups', function (Blueprint $table) {
            $table->dropForeign('price_groups_product_store_id_foreign');
        });
        Schema::table('product_category', function (Blueprint $table) {
            $table->dropForeign('products_categories_product_id_foreign');
        });
        Schema::table('product_category', function (Blueprint $table) {
            $table->dropForeign('products_categories_category_id_foreign');
        });
        Schema::table('product_store', function (Blueprint $table) {
            $table->dropForeign('products_stores_product_id_foreign');
        });
        Schema::table('product_store', function (Blueprint $table) {
            $table->dropForeign('products_stores_store_id_foreign');
        });
        Schema::table('medias', function (Blueprint $table) {
            $table->dropForeign('medias_product_id_foreign');
        });
        Schema::table('product_brand', function (Blueprint $table) {
            $table->dropForeign('products_brands_product_id_foreign');
        });
        Schema::table('product_brand', function (Blueprint $table) {
            $table->dropForeign('products_brands_brand_id_foreign');
        });
        Schema::table('product_tag', function (Blueprint $table) {
            $table->dropForeign('tags_product_id_foreign');
        });
        Schema::table('files', function (Blueprint $table) {
            $table->dropForeign('files_product_id_foreign');
        });
        Schema::table('product_displays', function (Blueprint $table) {
            $table->dropForeign('product_displays_product_id_foreign');
        });
        Schema::table('related_products', function (Blueprint $table) {
            $table->dropForeign('related_products_first_product_id_foreign');
        });
        Schema::table('related_products', function (Blueprint $table) {
            $table->dropForeign('related_products_second_product_id_foreign');
        });
        Schema::table('similar_products', function (Blueprint $table) {
            $table->dropForeign('similar_products_first_product_id_foreign');
        });
        Schema::table('similar_products', function (Blueprint $table) {
            $table->dropForeign('similar_products_second_product_id_foreign');
        });
        Schema::table('product_supplier', function (Blueprint $table) {
            $table->dropForeign('product_supplier_product_id_foreign');
        });
        Schema::table('product_supplier', function (Blueprint $table) {
            $table->dropForeign('product_supplier_supplier_id_foreign');
        });
    }
}
