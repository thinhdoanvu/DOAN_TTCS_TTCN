<?php


namespace App\Utilities;


class Constant
{
    /**
     *
     *
     * các hằng số, role dùng chung cho toàn hệ thống
     *
     */
    

    //Order
    const order_status_ReceiveOrders = 1;
    // const order_status_Unconfirmed = 2;
    const order_status_Confirmed = 3;
    const order_status_Paid = 4;
    const order_status_Processing = 5;
    const order_status_Shipping = 6;
    const order_status_Finish = 7;
    const order_status_Cancel = 0;
    public static $order_status_1 = [
        self::order_status_ReceiveOrders => 'Nhận đơn đặt hàng',//nhận đơn đặt hàng
        // self::order_status_Unconfirmed => 'Chưa được xác nhận',//chưa được xác nhận
        self::order_status_Confirmed => 'Đã xác nhận',//Đã xác nhận
        self::order_status_Processing => 'Chờ lấy hàng',//Xử lý
        self::order_status_Shipping => 'Đang chuyển hàng',//Đang chuyển hàng
        self::order_status_Finish => 'Kết thúc',//Kết thúc
        self::order_status_Paid => 'Trả hàng',//Trả
        self::order_status_Cancel => 'Hủy',//Hủy
    ];
    public static $order_status_2 = [
        // self::order_status_Unconfirmed => 'Chưa được xác nhận',//chưa được xác nhận
        self::order_status_Confirmed => 'Đã xác nhận',//Đã xác nhận
        self::order_status_Processing => 'Chờ lấy hàng',//Xử lý
        self::order_status_Shipping => 'Đang chuyển hàng',//Đang chuyển hàng
        self::order_status_Finish => 'Kết thúc',//Kết thúc
        self::order_status_Paid => 'Trả hàng',//Trả
    ];
    public static $order_status_3 = [
        self::order_status_Processing => 'Chờ lấy hàng',//Xử lý
        self::order_status_Shipping => 'Đang chuyển hàng',//Đang chuyển hàng
        self::order_status_Finish => 'Kết thúc',//Kết thúc
        self::order_status_Paid => 'Trả hàng',//Trả
    ];
    public static $order_status_4 = [
        self::order_status_Shipping => 'Đang chuyển hàng',//Đang chuyển hàng
        self::order_status_Finish => 'Kết thúc',//Kết thúc
        self::order_status_Paid => 'Trả hàng',//Trả
    ];
    public static $order_status_5 = [
        self::order_status_Finish => 'Kết thúc',//Kết thúc
        self::order_status_Paid => 'Trả hàng',//Trả
    ];

    //order payment type
    const order_pay_later = 'pay_later';
    const order_online_payment = 'online_payment';
    public static $order_payment_type = [
        self::order_pay_later => 'Thanh toán khi nhận hàng',
        self::order_online_payment => 'Chuyển khoản',
    ];

    //User
    const user_level_host = 0;//nv
    const user_level_admin = 1;//admin
    const user_level_client = 2;//người dùng
    public static $user_level = [
        self::user_level_host => 'host',
        self::user_level_admin => 'admin',
        self::user_level_client => 'client',
    ];
}