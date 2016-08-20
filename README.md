# make-controller-laravel
tạo controller từ file controller mẫu


Cài đặt

composer require hoanghiep/controller "dev-master"

b2. Chạy lệnh composer 

composer dump-autoload

b3. Đăng ký một dịch vụ mới config/app.php

'providers' => [
   /***** ****/
   Hoanghiep\Controller\HoanghiepControllerProvider::class,
  ]
  
b4. Chạy lệnh xuất bản các tập tin cần thiết

  php artisan vendor:publish
render :

  file_1 : `config/hoanghiep.php` => config path class controller old and controller new 
  file_2 : `app/console/Commands/ControllerCommand.php` => setting artisan.
  file_3 : `hoanghiep/controller/template` => layout
  

b5. Thiết lập chuẩn bị tập tin controller mẫu :

Vào config/hoanghiep.php 

template_controller_old => file controlller mẫu để sao chép function và method :

namespace_old => namespace tìm kiếm trong template_controller_old để thay thế.

class_controller_old => name class file mẫu template_controller_old để tìm kiếm thay thế 

namespace_news => nơi file controller sẽ được tạo ra.


b6. thêm lệnh arrtisan vào App\Console\Kernel.php

thêm class  Commands\ControllerCommand::class trong protected $commands

    protected $commands = [
        // Commands\Inspire::class,
         Commands\ControllerCommand::class
    ];
    

b7: Chạy lệnh để tạo ra một file controller mới giống như controller mẫu.

syntax artisan :

  php artisan make:controllers name_class

  
  Namespace == config/hoanghiep.php => namespace_news
  
  1 file controller  == `namespace_news/name_class`


END.  một file controller mới được tạo ra giống với file controller mẫu.
