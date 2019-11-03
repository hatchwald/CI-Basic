<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Employee Page</title>
    <!-- style -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">

    <!-- javascript -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.js"></script>
    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>  
    <script src="/assets/js/script.js"></script>  

</head>
<body>
    <div class="ui pointing menu">
    <a class="active item" href='/'>
        Home
    </a>
    <a class="item">
        Messages
    </a>
    <a class="item">
        Friends
    </a>
    <div class="right menu">
        <div class="item">
        <div class="ui transparent icon input">
            <input type="text" placeholder="Search...">
            <i class="search link icon"></i>
        </div>
        </div>
    </div>
    </div>
    <div class="ui segment">
        <button class="positive ui labeled icon button" id="ins_emp">
        <i class="plus circle icon"></i>
        Insert New Employee
        </button>
        <p></p>
        <table id="data_table" class="display">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>NIP</th>
                    <th>Hobby</th>
                    <th>Photo</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody style="text-align:center">
            </tbody>
        </table>
    </div>
    <div class="ui modal" id="empl_mod">
        <div class="header">Insert New Employee</div>
        <div class="content">
            <form action="" id="form_empl" method="POST" class="ui form" enctype="multipart/form-data">
                <input type="hidden" name="type_action" id="type_action" value="ins_employee">
                <input type="hidden" name="ids_emp" id="ids_emp">
                <div class="field">
                    <label for="">Name</label>
                    <input type="text" name="name_emp" id="name_emp" required>
                </div>
                <div class="field">
                    <label for="">Email</label>
                    <input type="email" name="email_emp" id="email_emp" required>
                </div>
                <div class="field">
                    <label for="">Gender</label>
                    <div class="ui selection dropdown">
                        <input type="hidden" name="gender_emp" id="gender_emp">
                        <div class="default text">Select Gender</div>
                        <i class="dropdown icon"></i>
                        <div class="menu">
                            <div class="item" data-value="laki-laki">Laki-Laki</div>
                            <div class="item" data-value="perempuan">Perempuan</div>
                        </div>
                    </div>
                </div>
                <div class="field">
                    <label for="">NIP</label>
                    <input type="number" name="nip_emp" id="nip_emp" required> 
                </div>
                <div class="field">
                    <label for="">Hobby</label>
                    <div class="ui selection dropdown">
                        <input type="hidden" name="hobby_emp" id="hobby_emp">
                        <div class="default text">Select Hobby</div>
                        <i class="dropdown icon"></i>
                        <div class="menu">
                            <div class="item" data-value="sepak bola">Sepak Bola</div>
                            <div class="item" data-value="voli">Voli</div>
                            <div class="item" data-value="tenis meja">Tenis Meja</div>
                        </div>
                    </div>
                </div>
                <div class="field">
                    <label for="">Photo</label>
                    <input type="file" name="photo_emp" id="photo_emp"    accept="image/jpeg, image/png" required> 
                </div>
                <div class="ui error message"></div>
            </form>
        </div>
        <div class="actions">
            <div class="ui cancel button">Cancel</div>
            <div class="primary ui button" id="sbmt_form">Submit</div>
        </div>
    </div>

    <!-- delete modal -->
    <div class="ui tiny modal" id="mod_delt">
        <div class="header">Delete Employee</div>
        <div class="content">
            <p>
                Are you sure you want to delete this Employee
            </p>
            <form action="/del_emp" method="POST" id="form_del">
                <input type="hidden" name="del_id" id="del_id">
            </form>
        </div>
        <div class="actions">
            <div class="ui negative button">
                No
            </div>
            <div class="ui positive right labeled icon button" id="conf_del">
                Yes
                <i class="checkmark icon"></i>
            </div>
        </div>
    </div>
</body>
</html>