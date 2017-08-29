   <!-- footer content -->
        <footer>
          <div class="pull-left">
            Index:Scale | All rights reserved. &copy; 2017
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- compose -->
    <div class="compose col-md-6 col-xs-12">
      <div class="compose-header">
        New Message
        <button type="button" class="close compose-close">
          <span>×</span>
        </button>
      </div>

      <div class="compose-body">
        <div id="alerts"></div>

        <div class="btn-toolbar editor" data-role="editor-toolbar" data-target="#editor">
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

        <div id="editor" class="editor-wrapper"></div>
      </div>

      <div class="compose-footer">
        <button id="send" class="btn btn-sm btn-success" type="button">Send</button>
      </div>
    </div>
    <!-- /compose -->

    <!-- Bootstrap -->
    <script src="<?php echo e(URL::asset('public/admin/vendors/bootstrap/dist/js/bootstrap.min.js')); ?>"></script>
    <!-- FastClick -->
    <script src="<?php echo e(URL::asset('public/admin/vendors/fastclick/lib/fastclick.js')); ?>"></script>
    <!-- NProgress -->
    <script src="<?php echo e(URL::asset('public/admin/vendors/nprogress/nprogress.js')); ?>"></script>
    <!-- Chart.js -->
    <script src="<?php echo e(URL::asset('public/admin/vendors/Chart.js/dist/Chart.min.js')); ?>"></script>
    <!-- jQuery Sparklines -->
    <script src="<?php echo e(URL::asset('public/admin/vendors/jquery-sparkline/dist/jquery.sparkline.min.js')); ?>"></script>

    <!-- DateJS -->
    <script src="<?php echo e(URL::asset('public/admin/vendors/DateJS/build/date.js')); ?>"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="<?php echo e(URL::asset('public/admin/vendors/moment/min/moment.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('public/admin/vendors/bootstrap-daterangepicker/daterangepicker.js')); ?>"></script>

    <script src="<?php echo e(URL::asset('public/admin/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js')); ?>"></script>
    <!-- iCheck -->
    <script src="<?php echo e(URL::asset('public/admin/vendors/iCheck/icheck.min.js')); ?>"></script>
    <!-- bootstrap-daterangepicker -->
    <!-- bootstrap-wysiwyg -->
    <script src="<?php echo e(URL::asset('public/admin/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('public/admin/vendors/jquery.hotkeys/jquery.hotkeys.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('public/admin/vendors/google-code-prettify/src/prettify.js')); ?>"></script>
    <!-- jQuery Tags Input -->
    <script src="<?php echo e(URL::asset('public/admin/vendors/jquery.tagsinput/src/jquery.tagsinput.js')); ?>"></script>
    <!-- Switchery -->
    <script src="<?php echo e(URL::asset('public/admin/vendors/switchery/dist/switchery.min.js')); ?>"></script>
    <!-- Select2 -->
    <script src="<?php echo e(URL::asset('public/admin/vendors/select2/dist/js/select2.full.min.js')); ?>"></script>
    <!-- Parsley -->
    <script src="<?php echo e(URL::asset('public/admin/vendors/parsleyjs/dist/parsley.min.js')); ?>"></script>
    <!-- Autosize -->
    <script src="<?php echo e(URL::asset('public/admin/vendors/autosize/dist/autosize.min.js')); ?>"></script>
    <!-- jQuery autocomplete -->
    <script src="<?php echo e(URL::asset('public/admin/vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js')); ?>"></script>
    <!-- starrr -->
    <script src="<?php echo e(URL::asset('public/admin/vendors/starrr/dist/starrr.js')); ?>"></script>
    <!-- Custom Theme Scripts -->
  <script src="<?php echo e(URL::asset('public/admin/vendors/validator/validator.js')); ?>"></script>
  
   <script src="<?php echo e(URL::asset('public/admin/vendors/datatables.net/js/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('public/admin/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('public/admin/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('public/admin/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('public/admin/vendors/datatables.net-buttons/js/buttons.flash.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('public/admin/vendors/datatables.net-buttons/js/buttons.html5.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('public/admin/vendors/datatables.net-buttons/js/buttons.print.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('public/admin/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('public/admin/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('public/admin/vendors/datatables.net-responsive/js/dataTables.responsive.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('public/admin/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('public/admin/vendors/datatables.net-scroller/js/dataTables.scroller.min.js')); ?>"></script>
    
    <script src="<?php echo e(URL::asset('public/admin/vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js')); ?>"></script>
    <!-- Custom Theme Scripts -->
    <script src="<?php echo e(URL::asset('public/admin/build/js/custom.min.js')); ?>"></script>

    <script src="<?php echo e(URL::asset('public/admin/vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('public/admin/vendors/validator/validator.js')); ?>"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.5/validator.min.js"></script>
    <script src="<?php echo e(URL::asset('public/admin/js/custom.js')); ?>"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCDAIVaDZvNU1RmrW5mUnOSS_Ru531z_cA&libraries=places&callback=initMap" async defer></script>