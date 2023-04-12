<?php
include("./navbar.php");
include("./sider.php");
?>
<!-- Main Content -->
<div class="main-content">
    <form class="form" id="mydata">
        <div class="form-body">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card">


                        <div class="card-header mt-4 ">
                            <div class="col-9">
                                <h4>Catogrey </h4>
                            </div>
                            <div class="col-3 align-right"><a class="btn btn-primary align-right" href="./category_view.php">View</a></div>
                        </div>

                        <div class="card-body">
                            <div class="form-group">
                                <label>Catagory Type</label>
                                <input type="text" class="form-control" name="category_type">
                            </div>
                            <div class="form-group mb-0">
                                <label>Details</label>
                                <input type="text" class="form-control" name="category_details">
                            </div>
                            <div class="form-group mb-0">
                                <label>Category Image</label>
                                <input type="file" class="form-control" name="category_img">
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn1 btn-primary" type="submit" name="sub">Submit</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
        $(".btn1").on("click", function(e) {
            e.preventDefault();
            var formData = new FormData(mydata);
            // alert(formData);
            $.ajax({
                url: "./category_insert_i.php",
                method: "POST",
                contentType: false,
                processData: false,
                data: formData,
                success: function(res) {
                    if (res == 1) {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                        })

                        Toast.fire({
                            icon: 'success',
                            title: 'Data Has Been Inserted'
                        })
                    } else if (res == 2) {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                        })

                        Toast.fire({
                            icon: 'error',
                            title: 'Data Has Not Been inserted'
                        })
                    } else if (res == 3) {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                        })

                        Toast.fire({
                            icon: 'warning',
                            title: 'Something went wrong'
                        })
                    } else if (res == 4) {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                        })

                        Toast.fire({
                            icon: 'warning',
                            title: 'Something  wrong'
                        })
                    } else if (res == 5) {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                        })

                        Toast.fire({
                            icon: 'warning',
                            title: ' wrong'
                        })
                    }
                }
            })
        })
    })
</script>
<?php
include("./footer.php");
?>