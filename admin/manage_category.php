<?php
include('includes/header.php')
?>
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                              <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Company</strong>
                                        <small> Form</small>
                                    </div>
                                    <div class="card-body card-block">
                                        <div class="form-group">
                                            <label for="company" class=" form-control-label">Company</label>
                                            <input type="text" id="company" placeholder="Enter your company name" class="form-control">
                                        </div>
                                    <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="file-input" class=" form-control-label">File input</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="file" id="file-input" name="file-input" class="form-control-file">
                                                </div>
                                    </div>
                                    <div class="card-body card-block">
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fa fa-dot-circle-o"></i> Submit
                                        </button>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>                    

<?php
include('includes/footer.php')
?>