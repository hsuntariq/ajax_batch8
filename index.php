<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <title>AJAX</title>
</head>

<body>

    <div class="container">
        <form class='col-lg-4 mx-auto shadow p-4'>
            <label for="">Name</label>
            <input type="text" placeholder="Name..." class="form-control name">
            <label for="">Email</label>
            <input type="email" placeholder="Email..." class="form-control email">
            <label for="">Age</label>
            <input type="number" placeholder="Age..." class="form-control age">
            <button class='btn my-2 btn-dark w-100'>
                Add
            </button>
        </form>
        <div class="container shadow col-lg-6 mx-auto p-4 my-4">

            <input type="search" id="search" class="form-control my-2" placeholder='search student...'>
        </div>
    </div>



    <button class="btn btn-primary load">
        Load Data
    </button>

    <div class="container shadow p-3">
        <table class="table text-center table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Age</th>
                </tr>
            </thead>
            <tbody id="body">

            </tbody>
        </table>
    </div>


    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>


    <script>
        let btn = $('.load')
        let body = $('.body')
        let n = $('.name')
        let em = $('.email')
        let a = $('.age')
        function loadData() {
            $(document).ready(function () {
                $.ajax({
                    url: './show-data.php',
                    type: "GET",
                    data: {},
                    success: function (data) {
                        $('#body').html(data)
                    }
                })
            })
        }

        loadData()



        $('.btn-dark').on('click', function (e) {
            e.preventDefault()
            // console.log(n.val())
            $.ajax({
                url: './add-data.php',
                type: "POST",
                data: {
                    name: n.val(),
                    email: em.val(), age: a.val()
                },
                success: function (data) {
                    if (data == 1) {
                        loadData()
                        n.val('')
                        em.val('')
                        a.val('')
                    } else {
                        console.log(data)
                    }
                }
            })
        })

        $('#search').on('keyup', function () {
            setTimeout(() => {
                $.ajax({
                    url: './search.php',
                    type: "POST",
                    data: {
                        search: $('#search').val()
                    },
                    success: function (data) {
                        $('#body').html(data)
                    }
                })
            }, 1000);
        })



    </script>

</body>

</html>