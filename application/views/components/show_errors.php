<!-- Modal -->
          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h4 class="modal-title">Fill The Form More Carefully!</h4>
                      </div>
                      <div class="modal-body">
                          <p> <?php echo validation_errors(); ?> </p>
                          <input type="text" name="errors" placeholder="Errors" autocomplete="off" class="form-control placeholder-no-fix">

                      </div>
                      <div class="modal-footer">
                          <button data-dismiss="modal" class="btn btn-default" type="button">OK</button>
                      </div>
                  </div>
              </div>
          </div>
<!-- modal -->
