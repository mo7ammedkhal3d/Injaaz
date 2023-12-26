@extends('layouts.mainlayout')
@section('content')
  <main id="main" class="main">
    <div class="row mb-5">
      <div class="col-2">
        <div class="pagetitle">
          <h1>اللوحات</h1>
          {{-- <nav>
          <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html">Home</a></li>
              <li class="breadcrumb-item">Pages</li>
              <li class="breadcrumb-item active">Blank</li>
          </ol>
          </nav> --}}
      </div>
      </div>
      <div class="col-2">
        <button class="btn btn-primary" onclick="addConfirm()">أضافة</button>
      </div>
    </div>

    <!--#region Edit Modal -->
    <div class="modal fade" id="add-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-center" role="document">
        <div class="modal-content">
          <div class="modal-header">
              <button id="btn-close" type="button" class="close btn-close-modal" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
            <div class="row m-0 p-0">    
              <div class="col-8">
                <form id="add-board" enctype="multipart/form-data">
                    <input id="name" type="text" class="form-control mb-3" name="name" placeholder="اسم اللوحة" aria-label="name" aria-describedby="basic-addon1">
                    <input id="description" type="text" class="form-control mb-3" name="description" placeholder="الوصف" aria-label="description" aria-describedby="basic-addon1">
                    <input id="add-member" type="text" class="form-control mb-3" name="title" placeholder="قم بدعوة أعضاء" aria-label="title" aria-describedby="basic-addon1">
                </form>
              </div>                  
            </div>
          </div>
          <div class="modal-footer">
              {{-- <button type="button" class="btn btn-secondary btn-close-modal"> Close</button> --}}
              <button id="btn-create" type="button" class="btn btn-primary">أنشاء</button>
          </div>
        </div>
    </div>
  </div>
  <!--#endregion Edit Modal -->
    <section class="section">
        <div class="row">
          <div class="col-lg-6">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">المشروع النهائي</h5>
                <p>مساحة للوصف المشروع</p>
              </div>
            </div>
  
          </div>
  
          <div class="col-lg-6">
  
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">نظام أرشفة</h5>
                <p>مساحة للوصف المشروع</p>
              </div>
            </div>
  
          </div>
        </div>
      </section>
  </main>
@endsection
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script>

function addConfirm(){
        $('#btn-close').on('click', function (){
            $('form')[0].reset();
            $('#add-modal').modal('hide');
        });
// fetch('http://127.0.0.1:8000/authors', {
//     method: 'GET',
// })
// .then(response => {  
//     if (!response.ok) {
//     throw new Error('Network response was not ok');
//     }
//     return response.json();
// })
//     .then(data => { data
//         data.forEach(author => {
//             $('#Aauthors').eq(0).append(`
//                 <option value="${author.id}">${author.name}</option>
//              `)
//         });
//     })
//     .catch(error => {
//         console.error('Error during fetch operation:', error);
//     });

$('#add-modal').modal('show');
}

//#endregion 

        $(document).ready(function(){





        });
</script>