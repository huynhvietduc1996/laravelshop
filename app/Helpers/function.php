<?php
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

if (!function_exists('upload_image')) {
    /**
     * @param $file: tên file trùng tên input
     * @param array $extendFileName: định dạng các file có thể upload được
     * @param array | int: tham số trả về là một mảng, nếu lỗi trả về 1
     */
    function upload_image($file, $folder = '', $extendFileName = array())
    {
        $code = 1;

        // Lấy đường dẫn ảnh
        $baseFileName = public_path() . '/uploads/' . $_FILES[$file]['name'];
        // Thông tin file
        $info = new SplFileInfo($baseFileName);
        //Lấy đuôi file
        $ext = strtolower($info->getExtension());

        // Kiểm tra định dạng file
        if (!$extendFileName)
            $extendFileName = ['png', 'jpg', 'jpeg', 'webp'];

        if (!in_array($ext, $extendFileName))
            return $data['code'] = 0;

        // Tên file mới
        $nameFile = trim(str_replace('.' . $ext, ' ', strtolower(($info->getFilename()))));
        $fileName = date('Ymd') . '_' . Str::slug($nameFile) . '.' . $ext;

        // Thư mục để lưu file
        $path = public_path() . '/uploads/' . date('Y/m/d/');

        if ($folder) {
            $path = public_path() . '/uploads/' . $folder . '/' . date('Y/m/d');
        }

        if (!File::exists($path)) {
            mkdir($path, 0777, true);
        }

        //Di chuyển file vào thư mục uploads
        move_uploaded_file($_FILES[$file]['tmp_name'], $path . $fileName);

        $data = [
            'name'     => $fileName,
            'code'     => $code,
            'path'     => $path,
            'path_img' => 'uploads/' . $fileName
        ];

        return $data;
    }
}

if (!function_exists('pare_url_file')) {
    function pare_url_file($image, $folder = '')
    {
        if (!$image) {
            return '/images/no-image.jpg';
        }

        $explode = explode('_', $image);

        if (isset($explode[0])) {
            $time = str_replace('_', '/', $explode[0]);
            return '/uploads' . $folder . '/' . date('Y/m/d', strtotime($time)) . '/' . $image;
        }
    }
}


if (!function_exists('device_agent')) {
    function device_agent()
    {
        $agent = new \Jenssegers\Agent\Agent();

        if ($agent->isMobile())
            return 'mobile';
        elseif ($agent->isDesktop())
            return 'desktop';
        elseif ($agent->isTablet())
            return 'tablet';
    }
}
