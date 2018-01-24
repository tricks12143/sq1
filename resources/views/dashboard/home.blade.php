@include('include.dashboard-header')



    <div class="alert-handler" id="alert-handler">
      <!--Alert goes through here-->
    </div>

    <div class="row">
      <div class="col col-md-7">

          <!-- Example Bar Chart Card-->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-bar-chart"></i> Bar Chart Example</div>
            <div class="card-body">
              <canvas id="myBarChart" width="100" height="50"></canvas>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
          </div>


        <div class="card mb-3">
          <div class="card-header">
            Ticket requiring your attention(10)
              <div class="pull-right">
                <div class="btn-group">
                  <p><i class="fa fa-plus" aria-hidden="true" data-toggle="modal" data-target="#tickerform"> Ticket</i></p>
                </div>
              </div>
          </div>
          <!-- /.panel-heading -->
          <div class="card-body">
            <div class="ticket-holder">

            </div>
            <!--to be dynamic-->
          </div>
          <!-- /.panel-body -->
        </div>

      </div>


      <!-- Modal -->
<div id="tickerform" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      
      <div class="modal-header">
        <h4 class="modal-title">Ticket Form</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <div class="modal-body">
        <form id="sq1-ticket-form">  
          <div class="form-group">
            <label for="ticket_subject">Subject</label>
            <input type="text" class="form-control" id="ticket_subject" name="ticket_subject">
            <div class="validation-container"></div>
          </div>

          <div class="form-group">
            <label for="ticket-desc">Description</label>
              <textarea class="form-control" rows="3" id="ticket-desc" name="ticket_desc"></textarea>
            <div class="validation-container"></div>
          </div>

          <div class="form-group">
              <label for="ticket-prio">Priority:</label>
              <select class="form-control" id="ticket-prio" name="ticket_prio">
                <option value="normal">Normal</option>
                <option value="high">High</option>
                <option value="highest">Highest</option>
              </select>
            <div class="validation-container"></div>
          </div>
      </div>

      <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
          </form>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>

    </div>

  </div>
</div>


    
    <div class="col col-md-5">

      <div class="row">
        <div class="col col-md-12">
          <div class="card mb-3">
              <div class="card-header">
                <div class="pull-left">
                  <div class="btn-group">
                      <i class="fa fa-angle-left" aria-hidden="true"></i>
                  </div>
                </div>
                <div class="pull-center">Date</div>
                  <div class="pull-right">
                    <div class="btn-group">
                      <i class="fa fa-angle-right" aria-hidden="true"></i>
                    </div>
                  </div>
                </div>
            
              <!-- /.panel-heading -->
              <div class="card-body">
                <div class="get-total-ticket-solved">
                    <div class="row">
                      <div class="col col-md-6">
                        <p>Total Hours Spent</p>
                      </div>
                      <div class="col col-md-6">
                        <div class="total-hours">

                        </div>
                      </div>
                    <div class="row">
                      <div class="col col-md-6">
                        <p>Account Balance</p>
                      </div>
                      <div class="col col-md-6">
                        <div class="grand-total">

                        </div>
                      </div>
                    </div>
                </div>
                <!--to be dynamic-->
              </div>
              <!-- /.panel-body -->
            </div>
          </div>
        </div>


          <div class="col col-md-12">
            <div class="card mb-3">
                <div class="card-header">
                  <h5>Log of Updates</h5>
                    <div class="date-nav">
                      <div class="pull-left">
                        <div class="btn-group">
                          <i class="fa fa-angle-left" aria-hidden="true"></i>
                        </div>
                      </div>
                    <div class="pull-center">Date</div>
                      <div class="pull-right">
                        <div class="btn-group">
                          <i class="fa fa-angle-right" aria-hidden="true"></i>
                        </div>
                      </div>
                    </div>
                  </div>
            
              <!-- /.panel-heading -->
              <div class="card-body">
                <div class="get-ticket-log">
                    
                </div>
                <!--to be dynamic-->
              </div>
              <!-- /.panel-body -->
            </div>
          </div>


      </div>
    </div>
  
  


<section class="blog-section">
  <div class="container">
    <h3>Blog Post</h3>
    
      <div class="blog-thumbs-container">

      </div>
  </div>
</section>








@include('include.dashboard-footer')