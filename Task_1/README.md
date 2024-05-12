# Setup project

## Download project

```git
# khởi tạo một Git repository
git init
# kích hoạt tính năng sparse-checkout
git sparse-checkout init
# Thêm đường dẫn của thư mục bạn muốn sao chép:
git sparse-checkout set task_1
# Cuối cùng, sao chép (clone) repository từ GitHub:
git remote add -f origin https://github.com/AT190510-Cuong/BlueCyber.git
git pull origin main
```

## Run project

- bật Docker Desktop
- vào thư mục có file **docker-compose.yml**

![image](https://hackmd.io/_uploads/B1hzFCrGR.png)

- Mở terminal chạy `docker-compose up`
- đợi cho đến khi database báo **ready for connections**

![image](https://hackmd.io/_uploads/HySTX0rfC.png)

- truy cập trang web tại `127.0.0.1:24001`

![image](https://hackmd.io/_uploads/SJTjiCrGC.png)

![image](https://hackmd.io/_uploads/HyT2hAHfA.png)

- đã có 2 tài khoản được tạo sẵn là:
  - `cuong:12345678`
  - `admin:987654321`
- có trang đăng ký tài khoản

![image](https://hackmd.io/_uploads/SyRAhCHz0.png)

- trang chính:

![image](https://hackmd.io/_uploads/Hk1FTCBGR.png)
