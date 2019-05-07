<?php
header('Access-Control-Allow-Origin: *'); 

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', "BackEnd\ServiceController@index" );




Route::prefix('adminpanel')->group(function () {

    Route::middleware(['BackEndNotAuthed'])->group(function () {

        Route::get('/', "BackEnd\HomeController@index");
        Route::get('/login', "BackEnd\HomeController@index")->name("admin_login");

        Route::post("auth", "BackEnd\HomeController@auth")->name("admin_auth");

    });


    // dashboard
    Route::middleware(['BackEndAuthed'])->group(function () {
        Route::get('/dashboard', "BackEnd\HomeController@dashboard")->name("admin_dashboard");

        Route::prefix('users')->group(function () {
            Route::get('/', "BackEnd\UserController@index")->name("admin_users");
            Route::get('/admins', "BackEnd\UserController@index2")->name("admin_users2");
            Route::get('/change_status', "BackEnd\UserController@change_status")->name("admin_change_status_user");
            Route::get('/add_user', "BackEnd\UserController@add_user")->name("admin_add_user");
            Route::post('/add_user_post', "BackEnd\UserController@add_user_post")->name("admin_add_user_post");
            Route::get('/orders/{user_id}', "BackEnd\UserController@orders");

        });


        Route::prefix('orders')->group(function () {
            Route::get('/', "BackEnd\OrderController@index")->name("admin_orders");
            Route::get('/executors', "BackEnd\OrderController@executors")->name("admin_order_executors");
            Route::get('/view', "BackEnd\OrderController@view")->name("admin_view_order");
            Route::get('/executor/change_status', "BackEnd\OrderController@change_status")->name("admin_change_status_order");
            Route::get('/messages/{order_id}', "BackEnd\OrderController@view_chats");
            Route::post('/messages/send_message', "BackEnd\OrderController@send_message")->name("send_message_post");
            Route::get('/view_order', "BackEnd\OrderController@view_order")->name("admin_view_order");


        });


        Route::prefix('offers')->group(function () {
            Route::get('/', "BackEnd\OfferController@index")->name("admin_offers");
            Route::get('/add_offer', "BackEnd\OfferController@add_offer")->name("admin_add_offer");
            Route::post('/add_offer_post', "BackEnd\OfferController@add_offer_post")->name("admin_add_offer_post");
            Route::get('/change_status', "BackEnd\OfferController@change_status")->name("admin_change_status_offer");
            Route::get('/delete_offer', "BackEnd\OfferController@delete_offer")->name("admin_change_delete_offer");

        });



        Route::prefix('news')->group(function () {
            Route::get('/', "BackEnd\NewsController@index")->name("admin_news");
            Route::get('/add_news', "BackEnd\NewsController@add_news")->name("admin_add_news");
            Route::post('/add_news_post', "BackEnd\NewsController@add_news_post")->name("admin_add_news_post");
            Route::get('/change_status', "BackEnd\NewsController@change_status")->name("admin_change_status_news");
            Route::get('/delete_news', "BackEnd\NewsController@delete_news")->name("admin_change_delete_news");

        });


        Route::prefix('info')->group(function () {
            Route::get('/', "BackEnd\infocontroller@index")->name("admin_info");
            Route::get('/add_info', "BackEnd\infocontroller@add_news")->name("admin_add_info");
            Route::post('/add_info_post', "BackEnd\infocontroller@add_news_post")->name("admin_add_info_post");
            Route::get('/change_status', "BackEnd\infocontroller@change_status")->name("admin_change_status_news");
            Route::get('/delete_news', "BackEnd\infocontroller@delete_news")->name("admin_change_delete_info");

        });


        Route::prefix('tickets')->group(function () {
            Route::get('/', "BackEnd\TicketController@index")->name("admin_tickets");
            Route::get('/close_ticket', "BackEnd\TicketController@close")->name("admin_close_ticket");
            Route::get('/view_ticket', "BackEnd\TicketController@view")->name("admin_view_ticket");
        });


        Route::get('/content', "BackEnd\PaymentController@index")->name("admin_content");
        Route::get('/local_notifications', "BackEnd\PaymentController@index")->name("admin_local_notifications");
        Route::get('/email_notifications', "BackEnd\PaymentController@index")->name("admin_email_notifications");
        Route::get('/tasks', "BackEnd\PaymentController@index")->name("admin_tasks");

        Route::prefix("messages")->group(function () {
            Route::get('inbox', "BackEnd\PaymentController@index")->name("admin_inbox_messages");

        });


        Route::prefix("search")->group(function () {
            Route::get('/', "BackEnd\PaymentController@index")->name("admin_search");

        });



        Route::prefix("writings")->group(function () {
            Route::get('/', "BackEnd\WritingController@index")->name("admin_writings");
            Route::get('/delete_writing', "BackEnd\WritingController@delete_writing")->name("admin_delete_writing");
            Route::get('/add_writing', "BackEnd\WritingController@add_writing")->name("admin_add_writing");
            Route::get('/edit_balance_writing', "BackEnd\WritingController@edit_balance_writing")->name("admin_edit_balance_writing");

Route::get('/orders', "BackEnd\WritingController@orders")->name("admin_writing_orders");

            Route::post('/edit_balance_writing_post', "BackEnd\WritingController@edit_balance_writing_post")->name("admin_edit_balance_writing_post");
            Route::post('/add_writing_post', "BackEnd\WritingController@add_writing_post")->name("admin_add_writing_post");

        });

        Route::get('/settings', "BackEnd\HomeController@settings")->name("admin_settings");
        Route::post('/edit_manger_post', "BackEnd\HomeController@edit_manger_post")->name("admin_edit_manger_post");
        Route::get('/logout', "BackEnd\HomeController@logout")->name("admin_logout");
});

});




Route::prefix('api')->middleware(['Api'])->group(function () {
    Route::get("/",function (){
        return json_encode(["api"=>"200","message"=>"it's work"]);
    });

    Route::prefix('user')->group(function () {
        Route::get("/",function (){
            return json_encode(["response"=>true,"route"=>"user","message"=>"it's work"]);
        });

//
//
        Route::get("/login",function (){
            return json_encode(["response"=>false,"message"=>"invalid request method"]);
        });
//

        Route::post("/login","Api\UserController@login");

        Route::get("/forget","Api\UserController@forget");
        Route::post("/register","Api\UserController@register");

    });
	

   Route::prefix('adminchats')->group(function () {

        Route::get("/list","Api\AdminChatController@list");
        Route::post("/send_message","Api\AdminChatController@add_message");

    });


    Route::get("/test","Api\OrderController@test");
    Route::get("admin/list","Api\UserController@admins_list");
    Route::prefix('orders')->group(function () {

        Route::post("/create","Api\OrderController@create");
        Route::get("/","Api\OrderController@index");
        Route::get("/new","Api\OrderController@new_list");



        Route::get("/add_admin","Api\OrderController@add_admin");
        Route::get("/get","Api\OrderController@get");

        //ضيف الراوت دا 
        Route::get("/admin","Api\OrderController@admin_list");
    });


    Route::get("/info","Api\HomeController@info");
    Route::get("/news","Api\HomeController@news");



    Route::get("offers","Api\OfferController@offers");

    Route::prefix('chats')->group(function () {

        Route::get("/list","Api\ChatController@list");
        Route::match(["POST","GET"],"/send_message","Api\ChatController@new_message");

    });
});
