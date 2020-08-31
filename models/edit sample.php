<!-- Edit project modal -->
  <div class="modal fade bs-example-modal-nw" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabel">Edit Employee</h4>
        </div>
        <div class="modal-body">
          <form id="editEmpInfo">
            <div class="form-group">
              <label for="mdlfname">First Name</label>
              <input type="text" class="form-control" id="mdlname" value="">
            </div>
            <div class="form-group">
              <label for="mdllname">Last Name</label>
              <input type="text" class="form-control" id="mdllname" value="">
            </div>
            <div class="form-group">
              <label for="mdlnic">NIC</label>
              <input type="text" class="form-control" id="mdlnic" value="">
            </div>
            <div class="form-group">
              <label for="exampleFormControlInput1">Telephone</label>
              <input type="text" class="form-control" id="mdldiscrip" value="">
            </div>
            <div class="form-group">
              <label for="exampleFormControlInput1">Email</label>
              <input type="text" class="form-control" id="mdlgndiv" value="">
            </div>
            <div class="form-group">
              <label for="exampleFormControlInput1">Address</label>
              <input type="text" class="form-control" id="mdlsource" value="">
            </div>
            <div class="form-group">
                <label for="mdlname">Started Date</label>
                <input type="text" class="form-control" id="mdlname" value="">
            </div>
            <div class="form-group">
              <label for="mdlcat">Category</label>
              <select id="mdlcat" class="select2_single form-control" tabindex="-1" required="required">
                <option value="">Select an option</option>
                <option value="1">Admin</option>
                <option value="2">Tailor</option>
                <option value="3">Manager</option>
              </select>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button id="mdlclose" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button id="mdlsave" type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
<!-- End edit project modal -->


<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Employee Info</h4>
      </div>
      <div class="modal-body">
        <table id="EmployeeInfoView" class="table">
          <tbody>
            <tr>
              <th style="width:25%">Employee:</th>
              <td></td>
            </tr>
            <tr>
              <th>Name:</th>
              <td></td>
            </tr>
            <tr>
              <th>NIC:</th>
              <td></td>
            </tr>
            <tr>
              <th>Address:</th>
              <td></td>
            </tr>
            <tr>
              <th>Email:</th>
              <td></td>
            </tr>
            <tr>
              <th>Phone No:</th>
              <td></td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<script>

function viewEmployee(id){
  // alert("hdcvb f");
  $.ajax({
    type: "POST",
    url: '../server.php?c=EmployeeController&m=getEmployee',
    data: {'id':id},
    success:
    function (data){
      // alert(data);
      //var table = $('#tableView').DataTable();
      //$("#viewEmpInfo").empty();
      var td='';

      for (i = 0; i < data.length; i++) {
        var d=data[0];          
        // var id = d.Employee_id;
        var id = d.tid;
        var fname = d.tFname;
        var lname = d.tLname;
        var nic = d.tNIC;
        var Pno = d.tPno;
        var email = d.tEmail;
        var address = d.tAddress;

        td+=
          '<tbody>\
          <tr>\
            <th style="width:25%">Employee :</th>\
            <td> '+fname+' '+lname+' </td>\
            <td> '+nic+'  </td>\
            <td> '+Pno+'  </td>\
            <td> '+email+'  </td>\
            <td> '+address+'  </td>\
          </tr>\
          </tbody>';

        $("#EmployeeInfoView").html(td);
      }
    },
  dataType: 'json'
  });
}
</script>


<div class="x_content">
  <!-- modals -->
  <!-- Large modal -->
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Large modal</button>

  <div class="modal fade bs-example-modal-lg in" tabindex="-1" role="dialog" aria-hidden="true" style="display: block;">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabel">Modal title</h4>
        </div>
        <div class="modal-body">
          <h4>Text in a modal</h4>
          <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
          <p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>

      </div>
    </div>
  </div>

  <!-- Small modal -->
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm">Small modal</button>

  <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabel2">Modal title</h4>
        </div>
        <div class="modal-body">
          <h4>Text in a modal</h4>
          <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
          <p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>

      </div>
    </div>
  </div>
  <!-- /modals -->
</div>

