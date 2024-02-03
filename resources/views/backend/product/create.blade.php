@extends('layouts/backend/main')
@section('main-section')


<div class="content-body">
            <div class="top-set">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 mt-3 mb-3">
                            <h3>Add new Product</h3> 
                        </div>
                    </div>
                </div>
                <section>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="card" style="border: 1px solid #e8e8e8;">
                                    <div class="card-header" style="border-bottom: 1px solid #e8e8e8;">
                                        <h4 class="mb-0 h6">Product Information</h4>
                                    </div>
                                    <form action="{{route('backend.product.store')}}" method="POST" enctype="multipart/form-data" id="create_product_form">
                                    <!-- <form  enctype="multipart/form-data" id="create_product_form" onsubmit="validateAndSubmit(event)"> -->
                                    @csrf
                                    <div class="card-body">
                                            <div class="form-group row">
                                                <label class="col-md-3 col-from-label">Product Name <span class="text-danger">*</span> <i
                                                        class="las la-language text-danger" title="Translatable"></i></label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" name="product_name" placeholder="Product Name" id="product_name">
                                                        <span id="productNameError" class="formFiedllerror"></span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-3 col-from-label">Minimum Purchase Qty <span
                                                        class="text-danger">*</span></label>
                                                <div class="col-md-8">
                                                    <input type="number" class="form-control" name="min_qty" min="1" value="1" id="min_qty" placeholder="Product Minimum Purchase Qty.">
                                                    <small class="text-muted">Customer need to purchase this minimum
                                                        quantity for this product. Minimum should be 1.</small>
                                                        <span id="minQtyError" class="formFiedllerror"></span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-3 col-from-label">Maximum Purchase Qty</label>
                                                <div class="col-md-8">
                                                    <input type="number" class="form-control" name="max_qty" min="0" id="max_qty" placeholder="Product Maximum Purchase Qty.">
                                                    <small class="text-muted">Customer will be able to purchase this
                                                        maximum quantity for this product. Default empty for
                                                        unlimited.</small>
                                                </div>
                                            </div>
                                        </div>    
                                   
                                </div>
                                <div class="card" style="border: 1px solid #e8e8e8;">
                                    <div class="card-header" style="border-bottom: 1px solid #e8e8e8;">
                                        <h4 class="mb-0 h6">Product Images</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label" for="signinSrEmail">Product
                                                Images<small>(600x600)</small></label>
                                            <div class="col-md-8">
                                                <div class="input-group" data-toggle="" data-type="image" data-multiple="true">
                                                    <div class="input-group-text"> 
                                                        <input type="file" id="product_images" name="product_images[]" multiple >
                                                    </div>  
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card" style="border: 1px solid #e8e8e8;">
                                    <div class="card-header" style="border-bottom: 1px solid #e8e8e8;">
                                        <h5 class="h6">Product price, stock
                                        </h5>
                                    </div>
                                    <div class="card-body hidden">
                                        <div class="no_product_variant">
                                            <div class="form-group row">
                                                <label class="col-md-3 col-from-label">Regular price <span
                                                        class="text-danger">*</span></label>
                                                <div class="col-md-8">
                                                    <input type="number" step="1" min="1" placeholder="Product Price" name="product_price" id="product_price" class="form-control"  >
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-3 col-from-label">SKU</label>
                                                <div class="col-md-8">
                                                    <input type="text" placeholder="SKU" name="sku" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-3 col-from-label">In Stock <span
                                                        class="text-danger">*</span></label>
                                                <div class="col-md-8">
                                                    <select class="form-control" id="stock_status" name="stock_status" required>
                                                        <option value="1" selected>In Stock</option>
                                                        <option value="0">Out of Stock</option>
                                                    </select>
                
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card" style="border: 1px solid #e8e8e8;">
                                    <div class="card-header" style="border-bottom: 1px solid #e8e8e8;">
                                        <h5 class="mb-0 h6">Product Discount</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <label class="col-sm-3 control-label" for="start_date">Discount Date Range</label>
                                            <div class="col-sm-9">
                                                <div class="input-group date">
                                                    <input type="date" class="form-control aiz-date-range" name="date_range"
                                                        placeholder="Select Date" autocomplete="off">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3 col-from-label">Discount <span class="text-danger">*</span></label>
                                            <div class="col-md-6">
                                                <input type="number" lang="en" min="1" step="1" placeholder="Discount"
                                                    name="discount" class="form-control">
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group"> 
                                                    <select class="form-control" id="discount_type" name="discount_type">
                                                        <option value="flat" selected>Flat</option>
                                                        <option value="percent">Percent</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card" style="border: 1px solid #e8e8e8;">
                                    <div class="card-header" style="border-bottom: 1px solid #e8e8e8;">
                                        <h5 class="h6">Product Description</h5>
                                        <p>Description </p>
                                    </div>
                                    <div class="card-body">
                                        <div id="container">
                                            <textarea id="editor" name="product_description"></textarea>
                                          
                                        </div>
                                    </div>
                                </div>
                                <div class="card" style="border: 1px solid #e8e8e8;">
                                    <div class="card-header d-flex justify-content-between" style="border-bottom : 1px solid #e8e8e8;">
                                        <h5 class="mb-0 pt-2">Product attributes</h5>
                                        <button class="btn btn-soft-dark" type="button" onclick="addAttribute()">Add new attribute</button>
                                    </div>
                                    <div class="card-body">
                                        <div class="alert alert-info">These attributes will be used only for filtering.</div>
                                        <div class="all-attributes"></div>
                                        <div class="header-nav-menu">
                                            <div class="row gutters-5" id="home"></div>
                                        </div>
                                        <div id="add_on"></div>
                                    </div>
                                </div>
                                <div class="card" style="border: 1px solid #e8e8e8;">
                                    <div class="card-header" style="border-bottom: 1px solid #e8e8e8;">
                                        <h5 class="mb-0 h6">SEO Meta Tags</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <label class="col-md-3 col-from-label">Meta Title</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control" name="meta_title" placeholder="Meta Title">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3 col-from-label">Description</label>
                                            <div class="col-md-9">
                                                <textarea name="meta_description" id="meta_description" row="8"></textarea>
                                            </div>
                                        </div>
                                            <div class="form-group row">
                                                <label class="col-md-3 col-form-label">Slug</label>
                                                <div class="col-md-8">
                                                    <input type="text" placeholder="Slug" id="slug" name="slug" class="form-control">
                                                </div>
                                            </div>
                                    </div>
                                </div>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mar-all  mb-3">
                                                <button class="btn btn-primary" >Add Product</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card" style="border: 1px solid #e8e8e8;">
                                    <div class="card-header" style="border-bottom: 1px solid #e8e8e8;">
                                        <h5 class="mb-0 h6">Product Status</h5>
                                    </div>
                                    <div class="card-body">
                                        <select class="form-control" id="product_status" name="product_status">
                                            <option value="0">Draft</option>
                                            <option value="1" selected>Published</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="card" style="border: 1px solid #e8e8e8;">
                                    <div class="card-header" style="border-bottom: 1px solid #e8e8e8;">
                                        <h5 class="mb-0 h6">Product Brand</h5>
                                    </div>
                                    <div class="card-body">
                                        <select class="form-control" name="product_brand" data-live-search="true" title="Select Brand">
                                            @foreach($brand_list as $brand)
                                            <option value="{{$brand->id}}">{{$brand->name}}</option> 
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <!------------------------------- PRODUCT CATEGORY ------------------------------------------->
                                <div class="card" style="border: 1px solid #e8e8e8;">
                                    <div class="card-header" style="border-bottom: 1px solid #e8e8e8;">
                                        <h5 class="mb-0 h6">Product Category</h5>
                                        <h6 class="float-right fs-13 mb-0">
                                            Select Main
                                            <span class="position-relative main-category-info-icon">
                                                <i class="las la-question-circle fs-18 text-info"></i>
                                                <span class="main-category-info bg-info p-2 position-absolute d-none border">These
                                                    will be used for Affiliate System.</span>
                                            </span>
                                        </h6>
                                    </div>
                                    <div class="card-body productCard-body">
                                        <div class="h-300px overflow-auto c-scrollbar-light">
                                            <div id="treeview_container" class="hummingbird-treeview">
                                                <ul id="treeview" class="hummingbird-base" style="display: block;">
                                                    @foreach($main_category_list as $key => $main_cat)
                                                        <li data-id="0">
                                                            <div class="product-card">
                                                                <span>
                                                                    <button onclick="showOptions(event, 'sub_cat_list_{{$key}}','show_{{$key}}','hide_{{$key}}')" id="show_{{$key}}" class="show_btn"><i class="fa-solid fa-plus"></i></button>
                                                                    <button onclick="hideOptions(event, 'sub_cat_list_{{$key}}','show_{{$key}}','hide_{{$key}}')" id="hide_{{$key}}" class="hide_btn" style="display:none;"><i class="fa-solid fa-minus"></i></button>
                                                                    <label for="main_cat_{{$key}}"></label>
                                                                    <input type="checkbox" id="main_cat_{{$key}}" name="main_categories[]" onchange="checkAllBox('main_cat_{{$key}}', 'sub_checkbox_{{$key}}')" value="{{$main_cat->id}}">
                                                                    <label for="main_cat_{{$key}}"> {{$main_cat->name}}</label>
                                                                </span> 
                                                            </div>
                    
                                                            <div id="sub_cat_list_{{$key}}" class="sub_cat_list">
                                                                @foreach($main_cat->subCategory as $sub_cat)
                                                                <div class="product-card">
                                                                    <span>
                                                                        <input type="checkbox" class="checkInside0 sub_checkbox_{{$key}}" name="sub_categories[]" value="{{$sub_cat->id}}" onchange="removeAllCheckBox('main_cat_{{$key}}', 'sub_checkbox_{{$key}}')">
                                                                        <label>{{$sub_cat->name}}</label>
                                                                    </span> 
                                                                </div>
                                                                @endforeach
                                                                
                                                            </div>
                                                        </li> 
                                                        @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </form>
                                <!------------------------------------------ END OF PRODUCT CATEGORY ----------------------------------------------->
                                <div class="card" style="border: 1px solid #e8e8e8;">
                                    <div class="card-header" style="border-bottom: 1px solid #e8e8e8;">
                                        <h4>VAT & Tax</h4>
                                    </div>
                                    <div class="card-body">
                                        <form id="vatTaxForm">
                                            <div class="form-group">
                                                <label for="amount">Amount:</label>
                                                <input type="number" class="form-control" id="amount" placeholder="Enter amount"
                                                    required>
                                            </div>
                
                                            <div class="form-group">
                                                <label for="vatRate">VAT Rate (%):</label>
                                                <input type="number" class="form-control" id="vatRate" placeholder="Enter VAT rate"
                                                    required>
                                            </div>
                
                                            <div class="form-group">
                                                <label for="taxRate">Tax Rate (%):</label>
                                                <input type="number" class="form-control" id="taxRate" placeholder="Enter Tax rate"
                                                    required>
                                            </div>
                
                                            <button type="button" class="btn btn-primary" onclick="calculate()">Calculate</button>
                                       
                                    </div>
                                    <div id="result" class="mt-4 mx-4"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </section>
            </div>
        </div>

        @section('javascript-section') 
        <script>
            function validateAndSubmit(event) {
            event.preventDefault(); 
                var formData = $('#create_product_form').serializeArray(); 

                
                var attributeName = $('#add_on select[name^="product_attributes"]');
                        attributeName.each(function(index, element) {
                            formData.push({
                                name: element.name,
                                value: $(element).val()
                            });
                        }); 
                        var attributeValue = $('#add_on select[name^="filtering_attributes"]');
                        attributeValue.each(function(index, element) {
                            formData.push({
                                name: element.name,
                                value: $(element).val()
                            });
                        });


 
                $.ajaxSetup({
                    header: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{route('backend.product.store')}}",  
                    type: "POST",
                    data: formData,
                    success: function(response){
                        console.log(response);
                    }
                });

            } 
        </script>

        <script>
            function addAttribute(){
                var imageInput = document.getElementById('product_images');

                 
                $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    }); 
                    var formData = $('#product_form').serializeArray(); 
                        var attributeName = $('#add_on select[name^="product_attributes"]');
                        attributeName.each(function(index, element) {
                            formData.push({
                                name: element.name,
                                value: $(element).val()
                            });
                        }); 
                        var attributeValue = $('#add_on select[name^="filtering_attributes"]');
                        attributeValue.each(function(index, element) {
                            formData.push({
                                name: element.name,
                                value: $(element).val()
                            });
                        }); 
                 $.ajax({
                    url: "{{route('backend.product.add_attribute')}}",
                    type: "POST",
                    data: formData,
                    success: function (response){
                        console.log(response);
                        // if(response.message == 'empty'){ 
                            var appendIn = document.getElementById('add_on');
                            var rowId = Date.now(); 
                            var add_to_html = '<div class="row gutters-5" id="">' +
                                  '<div class="col-md-3">' +
                                      '<div class="form-group">' +
                                          '<select onchange="get_attributes_values(this, '+rowId+')"  class="asf selectpicker form-control"  data-live-search="true" title="Main Category"name="product_attributes[]">';
                                          response.attributes.forEach(function(item) {
                                            add_to_html += '<option value="' + item.id + '">' + item.name + '</option>';
                                            });
                                            add_to_html +=  '</select>' +
                                      '</div>' +
                                  '</div>' +
                                  '<div class="col">' +
                                      '<div class="form-group">' +
                                       
                                          '<select class="form-control selectpicker" name="filtering_attributes[]" id="'+rowId+'" data-toggle="select2" data-placeholder="Choose ..." data-live-search="true" multiple="">' +
                                           
                                          '</select>' +
                                       
                                      '</div>' +
                                  '</div>' +
                                  '<div class="col-auto">' +
                                      '<button type="button" onclick="removePageLink(\'' + rowId + '\')" class="mt-1 btn btn-icon btn-circle btn-sm btn-soft-danger" style="background-color :#ef486a26; border-radius: 55px; color: #ef486a;">' +
                                          '<i class="fa-solid fa-xmark"></i>' +
                                      '</button>' +
                                  '</div>' +
                              '</div>';
                              appendIn.insertAdjacentHTML('beforeend', add_to_html);
                              
                              $('.selectpicker').selectpicker('refresh');
                            // }
                    }
                 });
            }

            function get_attributes_values(e, selectId) {
                $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    }); 
            $.ajax({ 
                type: "POST",
                data: {
                    attribute_id: $(e).val()
                },
                url: '{{route('backend.product.get-attribte-value')}}',
                success: function(response) { 
                    var add_to_html = '';
                    response.attributes_value.forEach(function(item) {
                    add_to_html += '<option value="'+item.id+'">'+item.name+'</option>'; 
                }); 
                    var selectFields = document.getElementById(selectId);  
                    selectFields.innerHTML += add_to_html; 
                    $('.selectpicker').selectpicker('refresh');
                }
            });
        }
        </script> 
<script>
    $(document).ready(function () {
        $('.aiz-date-range').datepicker({
            format: 'dd-mm-yyyy',
            autoclose: true,
            todayHighlight: true,
            showMeridian: true,
            forceParse: false,
            minuteStep: 1,
            startDate: new Date()
        });
    });
</script>

    <script>
        CKEDITOR.ClassicEditor.create(document.getElementById("editor"), {
             toolbar: {
                items: [
                    'exportPDF', 'exportWord', '|',
                    'findAndReplace', 'selectAll', '|',
                    'heading', '|',
                    'bold', 'italic', 'strikethrough', 'underline', 'code', 'subscript', 'superscript', 'removeFormat', '|',
                    'bulletedList', 'numberedList', 'todoList', '|',
                    'outdent', 'indent', '|',
                    'undo', 'redo',

                    'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
                    'alignment', '|',
                    'link', 'insertImage', 'blockQuote', 'insertTable', 'mediaEmbed', 'codeBlock', 'htmlEmbed', '|',
                    'specialCharacters', 'horizontalLine', 'pageBreak', '|',
                    'textPartLanguage', '|',
                    'sourceEditing'
                ],
                shouldNotGroupWhenFull: true
            }, 
            list: {
                properties: {
                    styles: true,
                    startIndex: true,
                    reversed: true
                }
            }, 
            heading: {
                options: [
                    { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                    { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                    { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                    { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
                    { model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' },
                    { model: 'heading5', view: 'h5', title: 'Heading 5', class: 'ck-heading_heading5' },
                    { model: 'heading6', view: 'h6', title: 'Heading 6', class: 'ck-heading_heading6' }
                ]
            },
             placeholder: 'Welcome to CKEditor&nbsp;5!',
             fontFamily: {
                options: [
                    'default',
                    'Arial, Helvetica, sans-serif',
                    'Courier New, Courier, monospace',
                    'Georgia, serif',
                    'Lucida Sans Unicode, Lucida Grande, sans-serif',
                    'Tahoma, Geneva, sans-serif',
                    'Times New Roman, Times, serif',
                    'Trebuchet MS, Helvetica, sans-serif',
                    'Verdana, Geneva, sans-serif'
                ],
                supportAllValues: true
            },
             fontSize: {
                options: [10, 12, 14, 'default', 18, 20, 22],
                supportAllValues: true
            },
              htmlSupport: {
                allow: [
                    {
                        name: /.*/,
                        attributes: true,
                        classes: true,
                        styles: true
                    }
                ]
            },
              htmlEmbed: {
                showPreviews: true
            },
             link: {
                decorators: {
                    addTargetToExternalLinks: true,
                    defaultProtocol: 'https://',
                    toggleDownloadable: {
                        mode: 'manual',
                        label: 'Downloadable',
                        attributes: {
                            download: 'file'
                        }
                    }
                }
            },
             mention: {
                feeds: [
                    {
                        marker: '@',
                        feed: [
                            '@apple', '@bears', '@brownie', '@cake', '@cake', '@candy', '@canes', '@chocolate', '@cookie', '@cotton', '@cream',
                            '@cupcake', '@danish', '@donut', '@dragée', '@fruitcake', '@gingerbread', '@gummi', '@ice', '@jelly-o',
                            '@liquorice', '@macaroon', '@marzipan', '@oat', '@pie', '@plum', '@pudding', '@sesame', '@snaps', '@soufflé',
                            '@sugar', '@sweet', '@topping', '@wafer'
                        ],
                        minimumCharacters: 1
                    }
                ]
            },
             removePlugins: [ 
                'AIAssistant',
                'CKBox',
                'CKFinder',
                'EasyImage', 
                'RealTimeCollaborativeComments',
                'RealTimeCollaborativeTrackChanges',
                'RealTimeCollaborativeRevisionHistory',
                'PresenceList',
                'Comments',
                'TrackChanges',
                'TrackChangesData',
                'RevisionHistory',
                'Pagination',
                'WProofreader',
                 'MathType',
                 'SlashCommand',
                'Template',
                'DocumentOutline',
                'FormatPainter',
                'TableOfContents',
                'PasteFromOfficeEnhanced'
            ]
        });
    </script>
  
    <script>
        function calculate() {
            var amount = parseFloat(document.getElementById('amount').value);
            var vatRate = parseFloat(document.getElementById('vatRate').value);
            var taxRate = parseFloat(document.getElementById('taxRate').value); 
            if (isNaN(amount) || isNaN(vatRate) || isNaN(taxRate)) {
                alert('Please enter valid numeric values.');
                return;
            } 
            var vatAmount = (amount * vatRate) / 100;
            var taxAmount = (amount * taxRate) / 100;
            var totalAmount = amount + vatAmount + taxAmount; 
            var resultHTML = '<h4>Result:</h4>' +
                '<p>VAT Amount: ₹' + vatAmount.toFixed(2) + '</p>' +
                '<p>Tax Amount: ₹ ' + taxAmount.toFixed(2) + '</p>' +
                '<p>Total Amount (including VAT and Tax): ₹ ' + totalAmount.toFixed(2) + '</p>';
            document.getElementById('result').innerHTML = resultHTML;
        }
    </script>
<script>
    $(document).ready(function () {
        $('.selectpicker').selectpicker();
    });
</script>
<script>  
        function checkAllBox(main, sub){
        var mainCheckboxs = document.getElementById(main); 
        var subCheckboxes = document.querySelectorAll('.'+sub);  
            for (var i = 0; i < subCheckboxes.length; i++) {
                subCheckboxes[i].checked = mainCheckboxs.checked;
            }  
        } 
        function removeAllCheckBox(main, sub){
            var mainCheckboxs = document.getElementById(main); 
            var subCheckboxes = document.querySelectorAll('.'+sub + ':checked');  
            if (subCheckboxes.length > 0) { 
                mainCheckboxs.checked = true; 
            }else{
                mainCheckboxs.checked = false; 
            }
        } 
        function showOptions(event, option,show,hide){
            event.preventDefault();
            const subCatList = document.getElementById(option);
            const showBtn=document.getElementById(show);
            const hideBtn=document.getElementById(hide)
            showBtn.style.display="none";
            hideBtn.style.display="inline"    
            if(subCatList.style.display="none")
            subCatList.style.display="block";
    } 
    function hideOptions(event, option,show,hide){
        event.preventDefault();
        const subCatList = document.getElementById(option);
        const showBtn=document.getElementById(show);
        const hideBtn=document.getElementById(hide)
        showBtn.style.display="inline";
        hideBtn.style.display="none" 
        if(subCatList.style.display="block")
        subCatList.style.display="none";
    } 
    </script>
        @endsection
@endsection