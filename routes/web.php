<?php
//Front end

Route::get('', 'FrontEnd\IndexController@getIndex');
Route::get('about', 'FrontEnd\IndexController@getAbout');
Route::get('contact', 'FrontEnd\IndexController@getContact');

Route::group(['prefix' => 'comment'], function () {
    Route::get('', 'FrontEnd\CommentController@getComment');
});

Route::group(['prefix' => 'product'], function () {
    Route::get('shop', 'FrontEnd\ProductController@getShop');
    Route::get('detail/{idPrd}', 'FrontEnd\ProductController@getDetail');
    Route::get('checkout', 'FrontEnd\ProductController@getCheckOut');
    Route::get('complete', 'FrontEnd\ProductController@getComplete');
});

Route::group(['prefix' => 'cart'], function () {
    Route::get('', 'FrontEnd\CartController@getCart');
});


//Back end
//Login
Route::get('login', 'BackEnd\LoginController@getLogin')->middleware('CheckLogout');
Route::post('login', 'BackEnd\LoginController@postLogin');

Route::group(['prefix' => 'admin', 'middleware' => 'CheckLogin'], function () {
    Route::get('', 'BackEnd\LoginController@getIndex');
    Route::get('logout', 'BackEnd\LoginController@logOut');

    //Product
    Route::group(['prefix' => 'product'], function () {
        Route::get('', 'BackEnd\ProductController@getListProduct');

        Route::get('add', 'BackEnd\ProductController@getAddProduct');
        Route::post('add', 'BackEnd\ProductController@postAddProduct');

        Route::get('edit/{idPrd}', 'BackEnd\ProductController@getEditProduct');
        Route::post('edit/{idPrd}', 'BackEnd\ProductController@postEditProduct');

        Route::get('del/{idPrd}', 'BackEnd\ProductController@delProduct');

        Route::get('detail-attr', 'BackEnd\ProductController@getDetailAttr');
        Route::post('add-attr', 'BackEnd\ProductController@addAttr');
        Route::post('add-value', 'BackEnd\ProductController@addValue');
        Route::get('edit-attr/{id}', 'BackEnd\ProductController@getEditAttr');
        Route::post('edit-attr/{id}', 'BackEnd\ProductController@postEditAttr');
        Route::get('del-attr/{id}', 'BackEnd\ProductController@delAttr');

        Route::post('add-value', 'BackEnd\ProductController@addValue');
        Route::get('edit-value/{id}', 'BackEnd\ProductController@getEditValue');
        Route::post('edit-value/{id}', 'BackEnd\ProductController@postEditValue');
        Route::get('del-value/{id}', 'BackEnd\ProductController@delValue');

        Route::get('add-variant/{id}', 'BackEnd\ProductController@getAddVariant');
        Route::post('add-variant/{id}', 'BackEnd\ProductController@postAddVariant');
        Route::get('edit-variant/{id}', 'BackEnd\ProductController@getEditVariant');
        Route::post('edit-variant/{id}', 'backend\ProductController@postEditVariant');

        Route::get('del-variant/{id}', 'BackEnd\ProductController@delVariant');
    });

    //Category
    Route::group(['prefix' => 'category'], function () {
        Route::get('', 'BackEnd\CategoryController@getCategory');
        Route::post('', 'BackEnd\CategoryController@postCategory');

        Route::get('edit/{idCate}', 'BackEnd\CategoryController@getEditCategory');
        Route::post('edit/{idCate}', 'BackEnd\CategoryController@postEditCategory');

        Route::get('del/{idCate}', 'BackEnd\CategoryController@delCategory');
    });

    //Order
    Route::group(['prefix' => 'order'], function () {
        Route::get('', 'BackEnd\OrderController@getOrder');
        Route::get('detail', 'BackEnd\OrderController@getDetailOrder');
        Route::get('processed', 'BackEnd\OrderController@getProcessOrder');
    });

    //Comment
    Route::group(['prefix' => 'comment'], function () {
        Route::get('', 'BackEnd\CommentController@getComment');
        Route::get('edit', 'BackEnd\CommentController@getEditComment');
    });

    //User
    Route::group(['prefix' => 'user'], function () {
        Route::get('', 'BackEnd\UserController@getListUser');
        Route::get('add', 'BackEnd\UserController@getAddUser');
        Route::post('add', 'BackEnd\UserController@postAddUser');
        Route::get('edit/{idUser}', 'BackEnd\UserController@getEditUser');
        Route::post('edit/{idUser}', 'BackEnd\UserController@postEditUser');
        Route::get('del/{idUser}', 'BackEnd\UserController@delUser');
    });
});
