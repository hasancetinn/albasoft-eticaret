@extends('layouts.app')

@section('title', 'Product')

@section('additional-css')
    <link rel="stylesheet" href="{{asset('assets/plugins/custom/datatables/datatables.bundle.css')}}">
    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>

@endsection

@section('content')
    <div class="container">
        <div class="card card-custom" id="app">
            <div class="card-header flex-wrap border-0 pt-6 pb-0">
                <div class="card-title">
                    <h3 class="card-label">Products</h3>
                </div>
                <div class="card-toolbar">
                    <!--begin::Button-->
                    <a href="#" class="btn btn-primary font-weight-bolder" data-toggle="modal" data-target="#kayitEkle"
                       v-on:click="addNewRow">
											<span class="svg-icon svg-icon-md">
												<!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
												<svg xmlns="http://www.w3.org/2000/svg"
                                                     xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                     height="24px" viewBox="0 0 24 24" version="1.1">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<rect x="0" y="0" width="24" height="24"></rect>
														<circle fill="#000000" cx="9" cy="15" r="6"></circle>
														<path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z"
                                                              fill="#000000" opacity="0.3"></path>
													</g>
												</svg>
                                                <!--end::Svg Icon-->
											</span>Add Product</a>
                    <!--end::Button-->
                </div>

            </div>
            <div class="card-body">
                <!--begin: Datatable-->
                <div id="kt_datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-bordered table-checkable mt-10 dataTable no-footer dtr-inline"
                                   id="kt_datatable" role="grid" aria-describedby="kt_datatable_info"
                                   style="width: 1229px;">
                                <thead>
                                <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="kt_datatable" rowspan="1"
                                        colspan="1"
                                        style="width: 100px;" aria-sort="ascending">Product Name
                                    </th>

                                    <th class="sorting" tabindex="0" aria-controls="kt_datatable" rowspan="1"
                                        colspan="1"
                                        style="width: 100px;">
                                        Category Slug
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="kt_datatable" rowspan="1"
                                        colspan="1"
                                        style="width: 100px;">
                                        Description
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="kt_datatable" rowspan="1"
                                        colspan="1"
                                        style="width: 100px;">
                                        Price
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="kt_datatable" rowspan="1"
                                        colspan="1"
                                        style="width: 100px;">
                                        Category Name
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="kt_datatable" rowspan="1"
                                        colspan="1"
                                        style="width: 100px;">
                                        Image
                                    </th>
                                    <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 50px;"
                                        aria-label="Actions">Actions
                                    </th>
                                </tr>
                                </thead>
                                <tbody>


                                </tbody>
                            </table>

                            <div class="modal fade" id="addModal" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog">

                                    <div class="modal-content">
                                        <form class="needs-validation" novalidate>
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Category Add</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-6 form-group m-form__group">
                                                        <label for="">
                                                            Category Name
                                                        </label>
                                                        <input type="text" class="form-control m-input m-input--square"
                                                               placeholder="Category Name" v-model="product_name">
                                                    </div>

                                                    <div class="col-6 form-group m-form__group">
                                                        <label for="">
                                                            Slug
                                                        </label>
                                                        <input type="text" class="form-control m-input m-input--square"
                                                               placeholder="Short Name" v-model="slug">
                                                    </div>
                                                    <div class="col-6 form-group m-form__group">
                                                        <label for="">
                                                            Description
                                                        </label>
                                                        <input type="text" class="form-control m-input m-input--square"
                                                               placeholder="Description" v-model="description">
                                                    </div>
                                                    <div class="col-6 form-group m-form__group">
                                                        <label for="">
                                                            Price
                                                        </label>
                                                        <input type="text" class="form-control m-input m-input--square"
                                                               placeholder="Price" v-model="price">
                                                    </div>
                                                    <div class="col-6 form-group m-form__group">
                                                        <label>Categories</label>
                                                        <select name="category_id"
                                                                class="form-control form-control-solid form-control-lg"
                                                                v-model="category_id" id="category_id">
                                                            <option v-bind:value="null">- Choose -</option>
                                                            <option v-for="item in categories" v-bind:value="item.id">
                                                                @{{item.category_name}}
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="col-6 form-group m-form__group">
                                                        <label>Image Upload</label>
                                                        <input type="file" v-on:change="onImageChange"
                                                               class="form-control">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                    Close
                                                </button>
                                                <button type="submit" @click.prevent="saveCategory"
                                                        class="btn btn-primary">
                                                    Save
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade" id="editModal" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog">

                                    <div class="modal-content">
                                        <form class="needs-validation" novalidate>
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Product Add</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-6 form-group m-form__group">
                                                        <label for="">
                                                            Category Name
                                                        </label>
                                                        <input type="text" class="form-control m-input m-input--square"
                                                               placeholder="Category Name" v-model="product_name">
                                                    </div>

                                                    <div class="col-6 form-group m-form__group">
                                                        <label for="">
                                                            Slug
                                                        </label>
                                                        <input type="text" class="form-control m-input m-input--square"
                                                               placeholder="Short Name" v-model="slug">
                                                    </div>
                                                    <div class="col-6 form-group m-form__group">
                                                        <label for="">
                                                            Description
                                                        </label>
                                                        <input type="text" class="form-control m-input m-input--square"
                                                               placeholder="Description" v-model="description">
                                                    </div>
                                                    <div class="col-6 form-group m-form__group">
                                                        <label for="">
                                                            Price
                                                        </label>
                                                        <input type="text" class="form-control m-input m-input--square"
                                                               placeholder="Price" v-model="price">
                                                    </div>
                                                    <div class="col-6 form-group m-form__group">
                                                        <label>Categories</label>
                                                        <select class="form-control form-control-solid form-control-lg"
                                                                v-model="category_id" id="category_id">
                                                            <option v-bind:value="null">- Choose -</option>
                                                            <option v-for="item in categories" v-bind:value="item.id">
                                                                @{{ item.category_name}}
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="col-6 form-group m-form__group">
                                                        <label>Image Upload</label>
                                                        <input type="file" v-on:change="onImageChange"
                                                               class="form-control">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                    Close
                                                </button>
                                                <button type="submit" @click.prevent="saveCategory"
                                                        class="btn btn-primary">
                                                    Save
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>

                </div>
                <!--end: Datatable-->
            </div>
        </div>
    </div>

@endsection

@section('additional_js')

    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
    <script type="text/javascript" charset="utf8"
            src="{{asset('/assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>

    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function () {
            'use strict';
            window.addEventListener('load', function () {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function (form) {
                    form.addEventListener('submit', function (event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>

    <script>

        var main_table = null;

        function loadMainTable() {
            if (main_table !== null) {
                main_table.clear();
                main_table.destroy();
                main_table = null;
            }

            main_table = $('#kt_datatable').DataTable({

                "paging": true,
                // "ordering": true,
                // "info": false,
                "searching": false,
                "bPaginate": true,
                "bLengthChange": false,
                "bFilter": true,
                "bInfo": false,
                "bAutoWidth": false,

                "processing": true,
                "serverSide": true,

                "ajax": {
                    "url": Laravel.url("product/fetch"),
                    "type": "POST",
                    "data": function (d) {
                        d.order[0].name = "id";
                        d._token = Laravel.csrf_token();
                    }
                },
                "order": [[0, "desc"]],
                "columns": [
                    {
                        "data": "product_name",
                        "orderable": false,
                    },
                    {
                        "data": "slug",
                        "orderable": false,
                        "class": "text-center",
                    },
                    {
                        "data": "description",
                        "orderable": false,
                        "class": "text-center",
                    },
                    {
                        "data": "price",
                        "orderable": false,
                        "class": "text-center",
                    },
                    {
                        "data": "category.category_name",
                        "orderable": false,
                        "class": "text-center",
                    },
                    {
                        "data": null,
                        "render": function (data, type, full, meta) {
                            {{--                            return "<img src={{public_path('uploads/urunler/')}}"+data.picture+ "width='70' class='img-thumbnail'/>"--}}
                                return "<img src=\"http://localhost/albasoft/public/uploads/urunler/" + data.picture + "\" height=\"50\"/>";
                        },
                        "orderable": false,
                    },
                    {
                        "data": null,
                        "orderable": false,
                        "class": "text-center",
                        "width": "200px",
                        render: function (data, type, row) {
                            return '' +
                                '<button type="button" class="btn btn-light-primary btn-icon mr-2" ' +
                                '  onclick=\'vueApp.mainTableEditRow(' + JSON.stringify(row) + ')\'>' +
                                '       <i class="fa fa-edit"></i>' +
                                '</button>' +
                                '<button type="button" class="btn btn-light-danger btn-icon" ' +
                                '   onclick="vueApp.mainTableRemoveRow(' + row.id + ')">' +
                                '       <i class="fa fa-trash"></i>' +
                                '</button>';

                        }
                    }

                ],
                "footerCallback": function (row, data, start, end, display) {

                }

            });

        }

        /*
        |
        |------------------------------------------------
        |  VUE APP
        |------------------------------------------------
        | # - Life Cylcle
        | # - https://alligator.io/vuejs/component-lifecycle/
        */
        var vueApp = null;

        if ($("#app").length !== 0)
            vueApp = new Vue({
                el: '#app',
                data: {
                    product_name: null,
                    slug: null,
                    description: null,
                    price: null,
                    categories: [],
                    category_id: null,
                    image: '',
                    v_id: null,
                },
                methods: {
                    onImageChange(e) {
                        let files = e.target.files || e.dataTransfer.files;
                        if (!files.length)
                            return;
                        this.createImage(files[0]);
                    },
                    createImage(file) {
                        let reader = new FileReader();
                        let vm = this;
                        reader.onload = (e) => {
                            vm.image = e.target.result;
                        };
                        reader.readAsDataURL(file);
                    },
                    loadCategories: function () {
                        axios.post(Laravel.url("product/fetch-categories"))
                            .then(response => {
                                this.categories = response.data.data
                            })
                            .catch(function (e) {
                                console.log(e);
                            })
                    },
                    resetModalData: function () {
                        vueApp.product_name = null;
                        vueApp.slug = null;
                        vueApp.description = null;
                        vueApp.price = null;
                        vueApp.category_id = null;
                        vueApp.image = '';

                    },
                    addNewRow: function () {
                        this.errors = {};
                        this.resetModalData();
                        $("#addModal").modal('show');
                    },
                    saveCategory() {
                        axios.post(this.v_id === null ? Laravel.url("product/add") : Laravel.url("product/" + this.v_id + "/update"),
                            {
                                product_name: this.product_name,
                                slug: this.slug,
                                description: this.description,
                                price: this.price,
                                category_id: this.category_id,
                                image: this.image,
                                id: this.v_id
                            })
                            .then(function (response) {
                                if (response.data.success) {
                                    displaySuccessMessage('Product Created.');
                                    location.reload();
                                    if (vueApp.v_id !== null)
                                        $("#editModal").modal('hide');
                                    else
                                        $("#addModal").modal('hide');
                                } else {
                                    displayWarningMessage(response.data.data.errors.message);
                                }
                            })
                            .catch(error => {
                                if (error.response.status === 422) {
                                    this.errors = error.response.data.errors
                                }
                            });
                    },
                    mainTableEditRow: function ($row) {
                        console.log($row);
                        vueApp.product_name = $row.product_name;
                        vueApp.slug = $row.slug;
                        vueApp.description = $row.description;
                        vueApp.price = $row.price;
                        vueApp.category_id = $row.category_id;
                        vueApp.image = $row.image;
                        vueApp.v_id = $row.id;

                        $("#editModal").modal('show');

                    },
                    mainTableRemoveRow: function (row_id) {
                        confirmMessage("Do you want to delete this row?",
                            function () {
                                axios.post(Laravel.url("product/" + row_id + "/delete"),
                                    {

                                        v_id: row_id
                                    }
                                )
                                    .then(function (response) {
                                        if (response.data.success) {
                                            main_table.ajax.reload();
                                            displaySuccessMessage(null);
                                        } else {
                                            displayWarningMessage(response.data.data.errors.message);
                                        }
                                    })
                                    .catch(function (e) {
                                        console.log(e);
                                    });
                            }
                        );


                    },
                },
                mounted: function () {
                    loadMainTable();
                    this.loadCategories();
                },
            });
    </script>
@endsection