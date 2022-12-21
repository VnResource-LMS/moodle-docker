# Lưu ý: Phải Get repository MOOELLE-DOCKER-VNR

# Setup moodle
1. Copy file .env và tiến hành cấu hình các biến cần thiết trong file .env
```
cp ./config/templates/.env.example .env
```

2. Tiến hành get source LMS từ git về local theo hướng dẫn bên dưới
Lưu ý: Phải có tài khoản github và tạo có personal access token
```
cd [Đến thư mục project]
git clone --branch [Branch mong muốn EX:(MOODLE311_STABLE)] --single-branch https://github.com/kietchungvnr/MOODLE_37.git source
```

3. Sau khi get source thành công tiến hành copy file config vào sourcre. Tiến hành kiểm tra lại file .env xem đã chỉnh sửa hay chưa
Để copy file config vào source làm theo câu lệnh bên dưới
```
cp ./config/templates/config.docker-template.php [Đường dẫn chưa source]
```

# Sau khi setup moodle o trên gõ lên bên dưới để tiến hành build LMS
Đối với lần đầu build thì chạy câu lệnh:
```
sudo docker-compose up --build -d
```

Đối với việc muốn update lại file .env thì chạy câu lệnh:
```
sudo docker-compose up -d
```

* Đối với source và moodledata phải phân quyền cho thư mục chạy câu lệnh:
```
sudo chmod 777 [Đường dẫn source]
sudo chmod 777 [Đường dẫn moodledata]
```

# Setup portainer để quản trị Docker sử dụng UI

1. Tạo volume
```
sudo docker volume create portainer_data
```
2. Tạo container cho portainer
```
sudo docker run -d -p 8000:8000 -p 9000:9000 --name portainer --restart=always -v portainer_data:/data portainer/portainer-ce:latest
```

# Setup learninglocker(xAPI)
* Truy cập thư mục gốc (moodle-docker-vnr)
* Lưu ý: Chỉ tiến hành cài xAPI trên môi trường nhân linux(ubuntu, debian, centos, etc..)

1. Tiến hành get source learninglocker
```
git clone https://github.com/adlnet/learninglocker-docker learninglocker
```
2. Truy cập vào folder learninglocker và xem file README.md để được hướng dẫn

# Tài liệu hướng dẫn sử dụng kỹ thuật Moodle
```
https://docs.google.com/document/d/1faS3pJzwSamiI_iYEZ4KUtSazkd973KG/edit?usp=sharing&ouid=101094468371402780971&rtpof=true&sd=true
```