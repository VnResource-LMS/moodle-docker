# Setup moodle thủ công
* Truy cập vào folder moodle

1. Copy file .env và tiến hành cấu hình các biến cần thiết trong file .env
```
cp .env.example $pwd/moodle/.env
```

2. Tiến hành get source LMS từ git về local theo hướng dẫn bên dưới
```
cd moodle
git clone --branch MOODLE311_STABLE --depth 1 --single-branch https://github.com/kietchungvnr/MOODLE_37.git source
```

3. Sau khi get source thành công tiến hành copy file config vào source, sau copy file config thì mở vào source chỉnh sửa lại cấu hình của file config, nhưng dòng nào mô tả được phép chỉnh sửa thì sửa trên dòng đó:
   Ex: dbhost, dbname, wwwroot, dataroot, etc... 
Để copy file config vào source làm theo câu lệnh bên dưới(Lưu ý: Để thực hiện câu lệnh phải đứng ở thư mục moodle)
```
cp config.docker-template.php $pwd/moodle/source/config.php
```

# Setup moodle tự động
* Truy cập vào folder moodle, chỉ click vào file setup.bat một lần. Nếu muốn setup lại thì phải xóa folder source
Để setup tự động click vào file
```
setup.bat
```
Khi setup xong thì phải cấu hình file .env

# Sau khi setup moodle bằng 1 trong 2 cách trên gõ lên bên dưới để tiến hành build LMS
Đối với lần đầu build thì chạy câu lệnh:
```
docker-compose up --build -d
```

Đối với việc muốn update lại file .env thì chạy câu lệnh:
```
docker-compose up -d
```

# Setup learninglocker(xAPI)
* Truy cập thư mục gốc (moodle-docker-vnr)
* Lưu ý: Chỉ tiến hành cài xAPI trên môi trường nhân linux(ubuntu, debian, centos, etc..)

1. Tiến hành get source learninglocker
```
git clone https://github.com/adlnet/learninglocker-docker learninglocker
```
2. Truy cập vào folder learninglocker và xem file README.md để được hướng dẫn