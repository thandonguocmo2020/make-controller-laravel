<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Hoanghiep\Controller\Content\BaseController;
use File;
use App;

class ControllerCommand extends Command {

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:controllers {name_file : Create a Controller form controller template}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle() {

        // file mẫu để lấy nội dung sao chép
        $template_old = config("hoanghiep.template_controller_old");
        // class file mẫu tìm kiếm để thay thế
        $namespace_old = config("hoanghiep.namespace_old");
        // namespace trong file mẫu tìm kiếm để thay thế
       
        $class_controller_old = config("hoanghiep.class_controller_old");
        // nơi tạo ra
        $namespace_new = config("hoanghiep.namespace_news");
        

        if ($template_old == "" || $namespace_old == "" || $class_controller_old == "" || $namespace_new == "") {
            $this->error("Nhap thong tin vao config_controller_generator");
            die();
        }

        // name file.php
        $file_name = $this->argument("name_file");

        $file = $file_name . ".php";
        // nơi tạo ra 
        $create_file = $namespace_new . "/" . $file;
        // nếu tồn tại file báo lỗi
        if (File::exists($create_file)) {
            $this->error("file exists");
            dd();
        } else {

            // lấy nội dung của một file mẫu 
            try {
                $contents = File::get($template_old);
                // tìm kiếm và thay thế namespace và class name
                $data = str_replace($namespace_old, $namespace_new, $contents);
                $data_new = str_replace($class_controller_old, $file_name, $data);

                // nếu không tạo mới
                $file_new = File::put($create_file, "$data_new");
                if($file_new){
                     $this->info("Create file $create_file suceess");
                }
               
                
            } catch (Illuminate\Filesystem\FileNotFoundException $exception) {
                die("The file doesn't exist");
            }




//            $basecontroller->add_content_file($file);
        }
    }

}
