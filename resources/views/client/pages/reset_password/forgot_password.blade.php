<!doctype html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quên mật khẩu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
        integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.4.0/axios.min.js"
        integrity="sha512-uMtXmF28A2Ab/JJO2t/vYhlaa/3ahUOgj1Zf27M5rOo8/+fcTUVH0/E0ll68njmjrLqOBjXM3V9NiPFL5ywWPQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
        integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"
        integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
    <div class="container padding-bottom-3x mb-2 mt-5" id="app">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <div class="forgot">

                    <h2>Quên mật khẩu?</h2>
                    <p>Đặt lại mật khẩu chỉ với vài bước đơn giản để bảo vệ tài khoản của bạn.</p>
                    <ol class="list-unstyled">
                        <li><span class="text-primary text-medium">1. </span>Nhập địa chỉ email bạn đã dùng khi đăng ký.</li>
                        <li><span class="text-primary text-medium">2. </span>Hệ thống sẽ gửi liên kết đặt lại mật khẩu tới email đó.</li>
                        <li><span class="text-primary text-medium">3. </span>Mở liên kết và nhập mật khẩu mới.</li>
                    </ol>

                </div>

                <form class="card mt-4">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="email-for-pass">Địa chỉ email</label>
                            <input class="form-control" type="text" id="email-for-pass" required="" v-model="email"><small
                                class="form-text text-muted">Nhập email bạn đã dùng khi đăng ký. Chúng tôi sẽ gửi liên kết đặt lại mật khẩu tới địa chỉ này.</small>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-success" type="button" v-on:click="checkmail()">Gửi liên kết đặt lại mật khẩu</button>
                        <a class="btn btn-danger" href="/home/login">Quay lại đăng nhập</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>
<script>
    new Vue({
        el      :   '#app',
        data    :   {
            email : '',
        },
        created()   {

        },
        methods :   {
            checkmail(){
                var payload = {
                    'email' : this.email
                }
                axios
                    .post('{{Route('CheckMail')}}', payload)
                    .then((res) => {
                        if(res.data.status) {
                            toastr.success(res.data.message, 'Thành công');

                        } else {
                            toastr.error(res.data.message, 'Lỗi');
                        }
                    })
                    .catch((res) => {
                        $.each(res.response.data.errors, function(k, v) {
                            toastr.error(v[0], 'Lỗi');
                        });
                    });
            }
        },
    });
</script>
</html>

