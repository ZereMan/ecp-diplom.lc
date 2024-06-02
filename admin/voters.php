<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <?php include 'includes/navbar.php'; ?>
    <?php include 'includes/menubar.php'; ?>

    <!-- Контенттік орамал. Бет мазмұнын қамтиды -->
    <div class="content-wrapper">
        <!-- Контенттік тақырып (Бет тақырыбы) -->
        <section class="content-header">
            <h1>
                Сайлаушыларды басқару
            </h1>
        </section>
        <!-- Негізгі мазмұн -->
        <section class="content">
            <?php
            if(isset($_SESSION['error'])){
                echo "
              <div class='alert alert-danger alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4><i class='icon fa fa-warning'></i> Қате!</h4>
                ".$_SESSION['error']."
              </div>
            ";
                unset($_SESSION['error']);
            }
            if(isset($_SESSION['success'])){
                echo "
              <div class='alert alert-success alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4><i class='icon fa fa-check'></i> Сәтті!</h4>
                ".$_SESSION['success']."
              </div>
            ";
                unset($_SESSION['success']);
            }
            ?>
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> Жаңа</a>
                        </div>
                        <div class="box-body">
                            <table id="example1" class="table table-bordered">
                                <thead>
                                <th>Сайлаушы ID</th>
                                <th>Аты</th>
                                <th>Тегі</th>
                                <th>Email</th>
                                <th>Профиль</th>
                                <th>Әрекеттер</th>
                                </thead>
                                <tbody>
                                <?php
                                $sql = "SELECT * FROM voters";
                                $query = $conn->query($sql);
                                while($row = $query->fetch_assoc()){
                                    $image = (!empty($row['photo'])) ? '../images/'.$row['photo'] : '../images/profile.jpg';
                                    echo "
                          <tr>
                            <td>".$row['voters_id']."</td>
                            <td>".$row['firstname']."</td>
                            <td>".$row['lastname']."</td>
                            <td>".$row['email']."</td>
                            <td>
                              <img src='".$image."' width='30px' height='30px'>
                              <a href='#edit_photo' data-toggle='modal' class='pull-right photo' data-id='".$row['id']."'><span class='fa fa-edit'></span></a>
                            </td>
                            <td>
                              <button class='btn btn-success btn-sm edit btn-flat' data-id='".$row['id']."'><i class='fa fa-edit'></i> Өзгерту</button>
                              <button class='btn btn-danger btn-sm delete btn-flat' data-id='".$row['id']."'><i class='fa fa-trash'></i> Жою</button>
                            </td>
                          </tr>
                        ";
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <?php include 'includes/voters_modal.php'; ?>
</div>
<?php include 'includes/scripts.php'; ?>

<script>
    $(function(){
        $(document).on('click', '.edit', function(e){
            e.preventDefault();
            $('#edit').modal('show');
            var id = $(this).data('id');
            getRow(id);
        });

        $(document).on('click', '.delete', function(e){
            e.preventDefault();
            $('#delete').modal('show');
            var id = $(this).data('id');
            getRow(id);
        });

        $(document).on('click', '.photo', function(e){
            e.preventDefault();
            var id = $(this).data('id');
            getRow(id);
        });

    });

    function getRow(id){
        $.ajax({
            type: 'POST',
            url: 'voters_row.php',
            data: {id:id},
            dataType: 'json',
            success: function(response){
                $('.id').val(response.id);
                $('#edit_firstname').val(response.firstname);
                $('#edit_lastname').val(response.lastname);
                $('#edit_email').val(response.email);
                $('#edit_password').val(response.password);
                $('.fullname').html(response.firstname+' '+response.lastname);
            }
        });
    }
</script>
</body>
</html>
