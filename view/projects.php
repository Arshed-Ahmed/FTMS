<?php include('../incl/header.php')?>
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Projects</h3>
      </div>

      <div class="title_right">
        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for...">
            <span class="input-group-btn">
              <button class="btn btn-default" type="button">Go!</button>
            </span>
          </div>
        </div>
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12">
        <div class="x_panel">
          <!-- <div class="x_title">
            <h2>Quotation</h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#">Settings 1</a>
                  </li>
                  <li><a href="#">Settings 2</a>
                  </li>
                </ul>
              </li>
              <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div> -->
          <div class="x_content">
            <div class="" role="tabpanel" data-example-id="togglable-tabs">
              <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">View Project</a>
                </li>
                <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">New Project</a>
                </li>
              </ul>
              <div id="myTabContent" class="tab-content">
                <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">

                  <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                      <div class="x_panel">
                        <div class="x_content">
                          <br />

                          <!-- start pop-over -->
                          <table id="projectTable" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                              <tr>
                                <th>Project name</th>
                                <th>GN Division</th>
                                <th>Status</th>
                                <th>Activities</th>
                                <th>Options</th>
                              </tr>
                            </thead>
                            <tbody>
                            </tbody>
                          </table>
                          <!-- end pop-over -->

                        </div>
                      </div>
                    </div>
                  </div>

                </div>
                <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">

                  <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                      <div class="x_panel">
                        <div class="x_title">
                          <h2>Project Information</h2>
                          <ul class="nav navbar-right panel_toolbox">

                          </ul>
                          <div class="clearfix"></div>
                        </div>
                        <div class="x_content">

                          <!-- Add new Project -->
                          <form id="projectForm" data-parsley-validate class="form-horizontal form-label-left">
                            <input type="text" id="id" name="id" class="invisible form-control col-md-7 col-xs-12">
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="name" name="name" class="form-control col-md-7 col-xs-12">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12">Category</label>
                              <div class="col-md-6 col-sm-6 col-xs-122">
                                <select id="category" class="select2_single form-control" tabindex="-1">
                                  <option></option>
                                  <option value="cat1">Category 1</option>
                                  <option value="cat2">Category 2</option>
                                  <option value="cat3">Category 3</option>
                                  <option value="cat4">Category 4</option>
                                  <option value="cat5">Category 5</option>
                                </select>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="project_category" class="control-label col-md-3 col-sm-3 col-xs-12">Description</label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea id="description" class="form-control" name="description" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.."
                                data-parsley-validation-threshold="10"></textarea>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12">Source</label>
                              <div class="col-md-6 col-sm-6 col-xs-122">
                                <select id="source" class="select2_single form-control" tabindex="-1">
                                  <option></option>
                                  <option value="source1">Source 1</option>
                                  <option value="source2">Source 2</option>
                                  <option value="source3">Source 3</option>
                                  <option value="source4">Source 4</option>
                                  <option value="source5">Source 5</option>
                                </select>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12">GN division</label>
                              <div class="col-md-6 col-sm-6 col-xs-122">
                                <select id="txtgndivision" class="select2_single form-control" tabindex="-1">
                                  <option value=""></option>
                                </select>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="address" class="control-label col-md-3 col-sm-3 col-xs-12">Address</label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="address" class="form-control col-md-7 col-xs-12" type="text" name="address">
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="budget" class="control-label col-md-3 col-sm-3 col-xs-12">Budget Allocation</label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="budget" class="form-control col-md-7 col-xs-12" type="text" name="budget">
                              </div>
                            </div>
                            <div class="form-group">
                             <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sdate">Start Date<span class="required">*</span>
                             </label>
                             <div class="col-md-6 col-sm-6 col-xs-12">
                               <div class='input-group date' id='sdate'>
                                 <input type='text' value="" class="form-control col-md-7 col-xs-12"/>
                                 <span class="input-group-addon">
                                  <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                              </div>
                            </div>
                          </div>
                          
                          <!-- <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Switch</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                              <div class="">
                                <label>
                                  <input type="checkbox" class="js-switch" checked /> Checked
                                </label>
                              </div>
                              <div class="">
                                <label>
                                  <input type="checkbox" class="js-switch" /> Unchecked
                                </label>
                              </div>
                            </div>
                          </div> -->

                          <div class="form-group">
                            <label class="col-md-3 col-sm-3 col-xs-12 control-label">Priority
                              <br>
                            </label>

                            <div class="col-md-9 col-sm-9 col-xs-12">
                              <div class="radio">
                                <label>
                                  <input type="radio" class="flat" checked name="iCheck"> Urgent
                                </label>
                              </div>
                              <div class="radio">
                                <label>
                                  <input type="radio" class="flat" name="iCheck"> Medium
                                </label>
                              </div>
                              <div class="radio">
                                <label>
                                  <input type="radio" class="flat" name="iCheck"> Low
                                </label>
                              </div>
                            </div>
                          </div>


                          <div class="ln_solid"></div>
                          <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                              <button class="btn btn-primary" type="reset">Reset</button>
                              <button type="submit" id="submit" class="btn btn-success" onclick="addProject();">Submit</button>
                              <button type="submit" id="update" class="btn btn-success" onclick="updateProject();" style="display: none;">Update</button>
                            </div>
                          </div>
                        </form>
                        <!-- end Add new Project -->
                      </div>
                    </div>
                  </div>
                </div>                   
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
  <!-- /page content -->

  <!-- Modals -->

  <!-- View project modal -->
  <div class="modal fade bs-example-modal-nw" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabel">View Project</h4>
        </div>
        <div class="modal-body">
          <form id="viewProInfo">
            <div class="form-group">
              <label for="exampleFormControlInput1">Project Name</label>
              <input type="text" class="form-control" id="mdlname" value="">
            </div>
            <div class="form-group">
              <label for="exampleFormControlInput1">Gn Division</label>
              <input type="text" class="form-control" id="mdlgndiv" value="">
            </div>
            <div class="form-group">
              <label for="exampleFormControlInput1">Description</label>
              <input type="text" class="form-control" id="mdldiscrip" value="">
            </div>
            <div class="form-group">
              <label for="exampleFormControlInput1">Address</label>
              <input type="text" class="form-control" id="mdlgndiv" value="">
            </div>
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Source</label>
            <input type="text" class="form-control" id="mdlsource" value="">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
</div>
<!-- End View project modal -->

<!-- Feasibility project modal -->
<div class="modal fade bs-example-modal-fs" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Feasibility</h4>
      </div>
      <div class="modal-body">
        <div class="table-responsive">
          <table class="table">
            <tbody>
              <tr>
                <th style="width:50%">Project Name:</th>
                <td></td>
              </tr>
              <tr>
                <th>Technical Officer:</th>
                <td></td>
              </tr>
            </tbody>
          </table>
          <div class="col-xs-12">
            <button class="btn btn-success pull-right">Request Feasibility</button>
            <button id="btnCustomizeFeasibility" class="btn btn-primary pull-right">Customize Email</button>
          </div>

          <div style="display: none;" id="emailFeasibility">
            <div class="x_content">
              <div id="alerts"></div>
              <div class="btn-toolbar editor" data-role="editor-toolbar" data-target="#editor-one">
                <div class="btn-group">
                  <a class="btn dropdown-toggle" data-toggle="dropdown" title="Font"><i class="fa fa-font"></i><b class="caret"></b></a>
                  <ul class="dropdown-menu">
                  </ul>
                </div>

                <div class="btn-group">
                  <a class="btn dropdown-toggle" data-toggle="dropdown" title="Font Size"><i class="fa fa-text-height"></i>&nbsp;<b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li>
                      <a data-edit="fontSize 5">
                        <p style="font-size:17px">Huge</p>
                      </a>
                    </li>
                    <li>
                      <a data-edit="fontSize 3">
                        <p style="font-size:14px">Normal</p>
                      </a>
                    </li>
                    <li>
                      <a data-edit="fontSize 1">
                        <p style="font-size:11px">Small</p>
                      </a>
                    </li>
                  </ul>
                </div>

                <div class="btn-group">
                  <a class="btn" data-edit="bold" title="Bold (Ctrl/Cmd+B)"><i class="fa fa-bold"></i></a>
                  <a class="btn" data-edit="italic" title="Italic (Ctrl/Cmd+I)"><i class="fa fa-italic"></i></a>
                  <a class="btn" data-edit="strikethrough" title="Strikethrough"><i class="fa fa-strikethrough"></i></a>
                  <a class="btn" data-edit="underline" title="Underline (Ctrl/Cmd+U)"><i class="fa fa-underline"></i></a>
                </div>

                <div class="btn-group">
                  <a class="btn" data-edit="insertunorderedlist" title="Bullet list"><i class="fa fa-list-ul"></i></a>
                  <a class="btn" data-edit="insertorderedlist" title="Number list"><i class="fa fa-list-ol"></i></a>
                  <a class="btn" data-edit="outdent" title="Reduce indent (Shift+Tab)"><i class="fa fa-dedent"></i></a>
                  <a class="btn" data-edit="indent" title="Indent (Tab)"><i class="fa fa-indent"></i></a>
                </div>

                <div class="btn-group">
                  <a class="btn" data-edit="justifyleft" title="Align Left (Ctrl/Cmd+L)"><i class="fa fa-align-left"></i></a>
                  <a class="btn" data-edit="justifycenter" title="Center (Ctrl/Cmd+E)"><i class="fa fa-align-center"></i></a>
                  <a class="btn" data-edit="justifyright" title="Align Right (Ctrl/Cmd+R)"><i class="fa fa-align-right"></i></a>
                  <a class="btn" data-edit="justifyfull" title="Justify (Ctrl/Cmd+J)"><i class="fa fa-align-justify"></i></a>
                </div>

                <div class="btn-group">
                  <a class="btn dropdown-toggle" data-toggle="dropdown" title="Hyperlink"><i class="fa fa-link"></i></a>
                  <div class="dropdown-menu input-append">
                    <input class="span2" placeholder="URL" type="text" data-edit="createLink" />
                    <button class="btn" type="button">Add</button>
                  </div>
                  <a class="btn" data-edit="unlink" title="Remove Hyperlink"><i class="fa fa-cut"></i></a>
                </div>

                <div class="btn-group">
                  <a class="btn" title="Insert picture (or just drag & drop)" id="pictureBtn"><i class="fa fa-picture-o"></i></a>
                  <input type="file" data-role="magic-overlay" data-target="#pictureBtn" data-edit="insertImage" />
                </div>

                <div class="btn-group">
                  <a class="btn" data-edit="undo" title="Undo (Ctrl/Cmd+Z)"><i class="fa fa-undo"></i></a>
                  <a class="btn" data-edit="redo" title="Redo (Ctrl/Cmd+Y)"><i class="fa fa-repeat"></i></a>
                </div>
              </div>

              <div id="editor-one" class="editor-wrapper"></div>

              <textarea name="descr" id="descr" style="display:none;"></textarea>

              <br />

              <div class="ln_solid"></div>

            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>

    </div>
  </div>
</div>
<!-- End feasibiity project modal -->

<!-- Estimation project modal -->
<div class="modal fade bs-example-modal-es" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Estimation</h4>
      </div>
      <div class="modal-body">
        <div class="table-responsive">
          <table class="table">
            <tbody>
              <tr>
                <th style="width:50%">Project Name:</th>
                <td></td>
              </tr>
              <tr>
                <th>Technical Officer:</th>
                <td></td>
              </tr>
            </tbody>
          </table>
          <div class="col-xs-12">
            <button class="btn btn-success pull-right">Request Estimation</button>
            <button class="btn btn-primary pull-right">Customize Email</button>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>

    </div>
  </div>
</div>
<!-- End Estimation project modal -->

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Project View</h4>
      </div>
      <div class="modal-body">
        <table id="projectInfoView" class="table">
          <tbody>
            <tr>
              <th style="width:50%">Project Name:</th>
              <td></td>
            </tr>
            <tr>
              <th>GN Division:</th>
              <td></td>
            </tr>
            <tr>
              <th>Budget:</th>
              <td></td>
            </tr>
            <tr>
              <th>Source:</th>
              <td></td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>

    </div>
  </div>
</div>
<!-- </> Modals -->

<?php include('../incl/footer.php')?>

<script>
  $(document).ready(function(){
    $('.ui-pnotify').remove();
    $('#sdate').datetimepicker({
      format: 'DD.MM.YYYY'
    });
    loadProjectData();
    loadGnDivision();

    $("#btnCustomizeFeasibility").click(function(){
      $("#emailFeasibility").css("display","");
    })
  })

  function loadGnDivision() {    
    $.ajax({  
      url: "/dsms/server.php?c=DeltotaController&m=getAllDivisions",  
      type: "POST",  
      dataType: "json",  
      success: function(data){
        var options ='';
        for (var i = 0; i < data.length; i++){
          var dRow = data[i];
          options+=
          '<select id="txtgndivision" class="select2_single form-control" tabindex="-1">\
          <option value="'+dRow.name+'">'+dRow.name+'</option>\
          </select>';
          $("#txtgndivision").html(options);
        } 
      }
    });  
  }

  //Load Project data function  
  function loadProjectData() {  
    $.ajax({  
      url: '/dsms/server.php?c=ProjectController&m=getAllProject',
      type: "POST",  
      dataType: "json",  
      success: function (data) {  
        // alert(JSON.stringify(data));
        var table = $('#projectTable').DataTable();
        $("#projectTable tbody").empty();
        for (i = 0; i < data.length; i++) {

          var id = data[i].project_id;
          var name = data[i].name;
          var gndivision = data[i].gn_division;
          var description = data[i].description;
          var source = data[i].source;              

          var function_feasibility = 'feasibilityHandle(' + id + ')';
          var function_estimation = 'estimationHandle(' + id + ')';

          var function_view = 'viewProject(' + id + ')';
          var function_edit = 'getProjectInfo(' + id + ')';
          var func_delete = 'deleteProject(' + id + ')';

          row = 
          ' <tr><td> '+name+'  </td><td> '+gndivision+'  </td>\
          <td><span class="label label-success label-xs">Active</span></td>\
          <td>\
          <button type="button" onclick="'+function_feasibility+'" class="btn btn-warning btn-xs">Feasibility</button>\
          <button type="button" data-toggle="modal" data-target=".bs-example-modal-es" onclick="'+function_estimation+'" class="btn btn-info btn-xs">Estimation</button>\
          <td>\
          <a href="#" class="btn btn-primary btn-xs" onclick="'+function_view+'" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-folder"></i> View </a>\
          <a href="#" class="btn btn-info btn-xs" onclick="'+function_edit+'"><i class="fa fa-pencil"></i> Edit </a>\
          <a href="#" class="btn btn-danger btn-xs" onclick="'+func_delete+'"><i class="fa fa-trash-o"></i> Delete </a>\
          </td>';

          $("#projectTable tbody").append(row);
        }
      }
    });  
  }

  function feasibilityHandle(){
    window.location.href = "feasibility.php";
  }

  // function estimationHandle(){
  //   alert("Hello World");
  // }
  
   //Add Project data Function   
   function addProject(){
    var name=$("#name").val();
    var category=$("#category").find('option:selected').val();
    var description=$("#description").val();
    var source=$("#source").find('option:selected').val();
    var gndivision=$("#txtgndivision").find('option:selected').val();    
    var address=$("#address").val();
    var budget=$("#budget").val(); 
    var sdate=$("#sdate").val(); 

    var proData={name:name,category:category,description:description,source:source,gndivision:gndivision,address:address,budget:budget,sdate:sdate};

    $.ajax({  
      url: "/dsms/server.php?c=ProjectController&m=addProject",  
      data: proData,
      type: "POST",
      dataType: "json",  
      success: function (data) {
        // alert(data+ " Susscessfully added to the system");
        new PNotify({
          title: 'New Thing',
          text: data+ " Susscessfully added to the system",
          type: 'success',
          styling: 'bootstrap3'
        });
        
        $("#home-tab").tab("show");
        loadProjectData();
        clearTextBox();

      },  
      error: function (errormessage) {  
        alert(errormessage.responseText);
        alert("Unable to add project");
      }
    });  
  } 

  function viewProject(id){
      // alert("hdcvb f");
      $.ajax({
        type: "POST",
        url: '/dsms/server.php?c=ProjectController&m=getProject',
        data: {'id':id},
        success:
        function (data){
         // alert(data);
         // var table = $('#tableView').DataTable();
         // $("#viewProInfo").empty();
         var td='';

         for (i = 0; i < data.length; i++) {
          var d=data[0];          
              // var id = d.project_id;
              var name = d.name;
              var address = d.description;
              var description = d.description;
              var source = d.source;
              var gndivision = d.gn_division;
              var budget = d.budget;

              td+=
              '<tbody>\
              <tr>\
              <th style="width:50%">Project Name :</th>\
              <td>'+name+'</td>\
              </tr>\
              <tr>\
              <th>GN Division :</th>\
              <td>'+gndivision+'</td>\
              </tr>\
              <tr>\
              <th>Budget :</th>\
              <td>'+budget+'</td>\
              </tr>\
              <tr>\
              <th>Source :</th>\
              <td>'+source+'</td>\
              </tr>\
              </tbody>';

              $("#projectInfoView").html(td);
            }
          },
          dataType: 'json'
        });
    }

    function getProjectInfo(id){
      $("#profile-tab").tab("show");
      $("#profile-tab").html("Update Project");
      $.ajax({
        type: "POST",
        url: '/dsms/server.php?c=ProjectController&m=getProject',
        data: {'id':id},
        success:

        function(data){
         $('#projectForm')[0].reset();
         $("#submit").css("display","none");
         $("#update").css("display","");

      // alert(data);
      var d=data[0];          
      var id = d.project_id;
      var name = d.name;
      var address = d.description;
      var description = d.description;
      var source = d.source;
      var gndivision = d.gn_division;
      var budget = d.budget;

      $("#id").val(id);
      $("#name").val(name);
      $("#category").val(category);
      $("#description").val(description);
      $("#source").val(source);
      $("#gndivision").val(gndivision);
      $("#address").val(address);
      $("#budget").val(budget);
    },
    dataType: 'json'
  });
    } 

   //Add Project data Function   
   function updateProject(){   
    var id=$("#id").val();
    var name=$("#name").val();
    // var category=$("#category").find('option:selected').val();
    var description=$("#description").val();
    var source=$("#source").find('option:selected').val();
    var gndivision=$("#txtgndivision").find('option:selected').val();
    var address=$("#address").val();
    var budget=$("#budget").val(); 

    var proData={id:id,name:name,description:description,source:source,gndivision:gndivision,address:address,budget:budget};

    $.ajax({  
      url: "/dsms/server.php?c=ProjectController&m=editProject",  
      data: proData,
      type: "POST",
      dataType: "json",  
      success: function (data) {  
        alert("Newly Updted Id is : "+ data);
        $("#home-tab").tab("show");
        $("#profile-tab").html("New Project");

        loadProjectData();
        clearData();
      }  
      // error: function (errormessage) {  
      //   alert(errormessage.responseText);
      //   alert("Unable to Updtae project");
      // }
    });  
  } 

  function deleteProject(id) {  
   var ans = confirm("Are you sure you want to delete this Record?");

   if (ans) {  
     $.ajax({  
      url: "/dsms/server.php?c=ProjectController&m=deleteProject",
      data: {'id':id},
      type: "POST",  
        // dataType: "json",  
        success: function (data) { 
         // alert('Deleted');
         new PNotify({
          // title: 'Oh No!',
          text: 'Project removed.',
          type: 'error',
          styling: 'bootstrap3'
        });
         loadProjectData();
       },  
       error: function (errormessage) {  
         alert(errormessage.responseText);  
       }  
     });  
   }  
 }


 function clearData() {
   $('input[type="text"]').val('');
 }
</script>