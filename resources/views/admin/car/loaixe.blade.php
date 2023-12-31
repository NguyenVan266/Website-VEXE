
<script src="{{asset('busmodel/js/jquery-3.3.1.min.js')}}"></script>
<link rel="stylesheet" type="text/css" href="{{asset('busmodel/css/style-qtv.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('boostrap/css/bootstrap.min.css')}}">

@extends('layouts.admin')
@section('content')
@include('sweetalert::alert')
    @if(session('success'))
        <div class="alert alert-success">
        {{session('success')}}
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">
        {{session('error')}}
        </div>
    @endif
    <div class="content loaixe row show">
        <div class="col-lg-6">
       {{--      <div class="col-lg-12">
                <span>Loại xe</span>
                <div id="busmodel">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>ID</th>
                                            <th>Tên loại xe</th>
                                            <th>Số lượng ghế</th>
                                            <th>Số hàng</th>
                                            <th>Số cột</th>
                                            <th>Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @php

                                    $i=0;
                                    @endphp
                                    @foreach ($busmodel as $key =>  $list)
                                    @php


                                    $i++;
                                    @endphp
                                        <tr>
                                            <td>{{$i}}</td>
                                            <td>{{$list->id}}</td>
                                            <td>@if ($list->tenloaixe==1)Ghế ngồi @else Giường nằm @endif</td>
                                            <td>{{$list->soluongghe}}</td>
                                            <td>{{$list->sohang}}</td>
                                            <td>{{$list->socot}}</td>
                                            <td>
                                                <ul class="list-inline m-0">

                                                    <li class="list-inline-item">
                                                        <a  href="#" data-id="{{$list->id}}"
                                                            data-target="#idEditBusModel" id="idEditBusModel" data-toggle="modal" class="btn btn-success btn-sm rounded-0"><i class="fa fa-edit"></i></a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <button data-id="{{$list->id}}" data-target="#dlrouteModal" class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="modal" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                        </table>
                </div>
            </div> --}}
            <div class="col-lg-12">
                <span>Thông tin loại xe</span>
                <form name="ttmodel" action="{{route('typecar.createloaixe')}}" method="post" class="">
                    @csrf
                    <br>
                    <input type="number" min="1" name="row" class="form-control" placeholder="Số hàng">
                    <br>
                    <input type="number" min="1" name="col" class="form-control"  placeholder="Số cột">
                    <br>
                    <select class="form-control" name="loaighe">
                        <option value="1">Ghế ngồi</option>
                        <option value="2">Giường nằm</option>
                    </select>
                    <input type="hidden" name="soghe">
                    <input type="hidden" name="noidung">
                    <br>
                    @can('add-loaixe')
                    <input type="button" onclick="changemodel()" name="apdung" class="btn btn-success" value="Áp dụng">
                    <input type="submit"  onclick="checksubmit(this)" name="submit" class="btn btn-warning" disabled="" value="Thêm Loại Xe" >
                    @endcan
                </form>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="">
                <div class="sodoxe">
                    <div>Chỉnh sửa sơ đồ loại xe
                        <hr>
                    </div>
                    <div class="col-lg-12" id="mapxe">
                        <div class="row">
                            <div class="col-lg-3"><div class="glyphicon glyphicon-check"></div></div>
                            <div class="col-lg-3"><div class="glyphicon glyphicon-check"></div></div>
                            <div class="col-lg-3"><div class="glyphicon glyphicon-check"></div></div>
                            <div class="col-lg-3"><div class="glyphicon glyphicon-check"></div></div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-3"><div class="glyphicon glyphicon-check"></div></div>
                            <div class="col-lg-3"><div class="glyphicon glyphicon-check"></div></div>
                            <div class="col-lg-3"><div class="glyphicon glyphicon-check"></div></div>
                            <div class="col-lg-3"><div class="glyphicon glyphicon-check"></div></div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-3"><div class="glyphicon glyphicon-check"></div></div>
                            <div class="col-lg-3"><div class="glyphicon glyphicon-check"></div></div>
                            <div class="col-lg-3"><div class="glyphicon glyphicon-check"></div></div>
                            <div class="col-lg-3"><div class="glyphicon glyphicon-check"></div></div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-3"><div class="glyphicon glyphicon-check"></div></div>
                            <div class="col-lg-3"><div class="glyphicon glyphicon-check"></div></div>
                            <div class="col-lg-3"><div class="glyphicon glyphicon-check"></div></div>
                            <div class="col-lg-3"><div class="glyphicon glyphicon-check"></div></div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-3"><div class="glyphicon glyphicon-check"></div></div>
                            <div class="col-lg-3"><div class="glyphicon glyphicon-check"></div></div>
                            <div class="col-lg-3"><div class="glyphicon glyphicon-check"></div></div>
                            <div class="col-lg-3"><div class="glyphicon glyphicon-check"></div></div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-3"><div class="glyphicon glyphicon-check"></div></div>
                            <div class="col-lg-3"><div class="glyphicon glyphicon-check"></div></div>
                            <div class="col-lg-3"><div class="glyphicon glyphicon-check"></div></div>
                            <div class="col-lg-3"><div class="glyphicon glyphicon-check"></div></div>
                        </div>
                    </div>
                </div>
                @can('add-loaixe')
                <div class="row" id="xnsodo">
                    <div class="col-lg-6">
                        <span onclick="fxacnhan()">Xác nhận</span>
                    </div>
                    <div class="col-lg-6">
                        <span onclick="huy()">Hoàn tác</span>
                    </div>
                </div>
                @endcan
                <br>
        </div>
    </div>
@endsection


<script>
        var xacnhan=0;
        var option = document.getElementsByClassName("option");
        for (var i = 0; i < option.length; i++) {
            option[i].classList.remove('selected');
        }
        option[4].classList.add('selected');
        option[4].getElementsByTagName('img')[0].setAttribute('src','{{asset("images/icons/bus-type-hover.png")}}');
        $(function () {
            var obj = {
                width: '100%',
                height: '100%',
                showTop: false,
                showBottom: false,
                collapsible: false,
                showHeader: true,
                filterModel: {on: true, mode: "AND", header: true},
                // scrollModel: {autoFit: true},
                resizable: false,
                roundCorners: false,
                rowBorders: true,
                columnBorders: false,
                postRenderInterval: -1,
                hoverMode: 'row',
                numberCell: { show: true, title: 'STT', width: 50, align: 'center'},
                stripeRows: true,
                freezeCols: 1,
                /*cellDblClick: function (event,ui) {
                }*/
            };
            obj.colModel = [
                {
                    title: "Thao tác",
                    width: 100,
                    editor: false,
                    dataIndx: "View",
                    align: 'center',
                    render: function (ui) {
                        var str = '';
                        str += '<a title="Edit" id="idEditBusModel" ><i class="glyphicon glyphicon-edit  text-success" style="padding-right: 5px; cursor: pointer;"></i></a>';
                        str += '<a title="Delete" id="idDelBusModel" ><i class="glyphicon glyphicon-remove  text-danger" style="padding-right: 5px; cursor: pointer;"></i></a>';
                        return str;
                    },
                    postRender: function (ui) {
                        var rowData = ui.rowData,
                            $cell = this.getCell(ui);
                        //add button
                        $cell.find("a#idEditBusModel")
                            .unbind("click")
                            .bind("click", function (evt) {
                                editModel(rowData["id"],rowData["tenloaixe"],rowData["soluongghe"],rowData["sohang"],rowData["socot"],rowData["sodo"]);
                            });
                        $cell.find("a#idDelBusModel")
                            .unbind("click")
                            .bind("click", function (evt) {
                                if(confirm("Bạn chắc chắn muốn xóa?"))
                                    location.assign(""+"/"+rowData["id"]);
                            });
                    }
                },

                {
                    title: "Số ghế",
                    width: 150,
                    dataIndx: "soluongghe",
                    dataType: "string",
                    editor: false,
                    align: 'center',
                    filter: {
                        type: 'textbox',
                        attr: 'placeholder="Tìm theo Số ghế"',
                        cls: 'filterstyle',
                        condition: 'contain',
                        listeners: ['keyup']
                    }
                },
                {
                    title: "Số hàng",
                    width: 150,
                    dataIndx: "sohang",
                    dataType: "string",
                    editor: false,
                    align: 'center',
                    filter: {
                        type: 'textbox',
                        attr: 'placeholder="Tìm theo Số hàng"',
                        cls: 'filterstyle',
                        condition: 'contain',
                        listeners: ['keyup']
                    }
                },
                {
                    title: "Số cột",
                    width: 150,
                    dataIndx: "socot",
                    dataType: "string",
                    editor: false,
                    align: 'center',
                    filter: {
                        type: 'textbox',
                        attr: 'placeholder="Tìm theo Số cột"',
                        cls: 'filterstyle',
                        condition: 'contain',
                        listeners: ['keyup']
                    }
                },
                {
                    title: "Loại ghế",
                    width: 100,
                    dataIndx: "tenloaixe",
                    dataType: "string",
                    editor: false,
                    align: "center",
                    render: function(ui){
                        if(ui.rowData["tenloaixe"]==1)
                            return "Ghế ngồi";
                        else if(ui.rowData["tenloaixe"])
                            return "Giường nằm";
                    },
                    filter: {
                        type: 'select',
                        condition: 'equal',
                        listeners: ['change'],
                        options: [
                            {'':'[All]'},
                            {'1':'Ghế ngồi'},
                            {'2':'Giường nằm'}
                        ]
                    }
                }
            ];

            obj.dataModel = {
                data: {!! json_encode($busmodel) !!} ,
                location: "local",
                sorting: "local",
                sortDir: "down"
            };
            obj.pageModel = {type: 'local', rPP:5, rPPOptions: [5, 10, 15, 20]};
            var $grid = $("#busmodel").pqGrid(obj);
            $grid.pqGrid("refreshDataAndView");
        });
        function editModel(id,row,col,loaighe,sodo){
            var ttrow = document.forms["ttmodel"]["row"];
            var ttcol = document.forms["ttmodel"]["col"];
            var ttloaighe = document.forms["ttmodel"]["loaighe"];
            var noidungsodo =document.forms["ttmodel"]["noidung"];
            var ttsubmit = document.forms["ttmodel"]["submit"];
            var ttsodo = sodo.split('');
            var view = document.getElementById('mapxe');
            var str ="<table style='width: 100%; height: 500px; border-collapse: separate; border-spacing: 5px 5px; '>";
            for (var i = 0; i<row;i++) {
                str+="<tr>"
                for (var j =0; j<col;j++) {
                    if (ttsodo[i*col+j]==1) {
                        str+="<td onclick='change(this)' class='glyphicon glyphicon-check'></td>";
                    }
                    else if (ttsodo[i*col+j]==0) {
                        str+="<td onclick='change(this)' class='glyphicon glyphicon-unchecked'></td>";
                    }
                }
                str+="</tr>";
            }
            str +="</table>";
            document.forms["ttmodel"]["ID"].value = id;
            ttrow.value = row;
            ttcol.value = col;
            ttloaighe.value = loaighe;
            noidungsodo.value = sodo;
            view.innerHTML = str;
            ttsubmit.value = "Lưu Thay Đổi";
            document.forms["ttmodel"]["row"].removeAttribute("readonly");
            document.forms["ttmodel"]["col"].removeAttribute("readonly");
            document.forms["ttmodel"]["loaighe"].removeAttribute("readonly");
            document.forms["ttmodel"]["apdung"].removeAttribute("disabled");
            ttsubmit.setAttribute("disabled","");
            document.getElementById("xnsodo").getElementsByTagName("span")[0].removeAttribute("disabled");
            document.getElementById("xnsodo").getElementsByTagName("span")[1].removeAttribute("disabled");
            xacnhan += 1;
        }
        function change(ev) {
            if(ev.classList.contains('glyphicon-check')) {
                ev.classList.remove('glyphicon-check');
                ev.classList.add('glyphicon-unchecked');
            }
            else {
                ev.classList.remove('glyphicon-unchecked');
                ev.classList.add('glyphicon-check');
            }
        }
        function changemodel() {
            var row = document.forms["ttmodel"]["row"].value;
            var col = document.forms["ttmodel"]["col"].value;
            if(row>0&&col!=""){
                var view = document.getElementById('mapxe');
                var str ="<table style='width: 100%; height: 500px; border-collapse: separate; text-align: center; border-spacing: 5px 5px; '>";
                for (var i = 0; i<row;i++) {
                    str+="<tr>"
                    for (var j =0; j<col;j++) {
                        str += "<td onclick='change(this)' class='glyphicon glyphicon-unchecked'></td>";
                    }
                    str+="</tr>";
                }
                str +="</table>";
                view.innerHTML = str;
                document.forms["ttmodel"]["row"].setAttribute("readonly","");
                document.forms["ttmodel"]["col"].setAttribute("readonly","");
                document.forms["ttmodel"]["loaighe"].setAttribute("readonly","");
                document.forms["ttmodel"]["apdung"].setAttribute("disabled","");
                xacnhan += 1;
            }
            else {
                alert("Chưa điền đầy đủ thông tin của loại xe!");
            }
        }
        function fxacnhan() {
            var view = document.getElementById('mapxe');
            var row = document.forms['ttmodel']['row'].value;
            var col =document.forms['ttmodel']['col'].value;
            var str ="";
            var soghe = 0;
            if (xacnhan==0)
                return;
            for (var i = 0;i<row;i++){
                var trow = view.getElementsByTagName('tr')[i];
                for(var j = 0;j<col;j++){
                    var tcol =trow.getElementsByTagName('td')[j];
                    if(tcol.classList.contains('glyphicon-check')) {
                        str+="1";
                        soghe+=1;
                    }
                    else if(tcol.classList.contains('glyphicon-unchecked')) {
                        str+="0";
                    }
                }
            }
            alert(str+str.length+soghe);
            document.forms['ttmodel']['noidung'].value = str;
            document.forms['ttmodel']['soghe'].value = soghe;
            document.forms['ttmodel']['submit'].removeAttribute("disabled");
            xacnhan += 1;
        }
        function huy() {
            location.assign(location.href);
        }
        function checksubmit(ev) {

        }
    </script>

