<?php $this->layout('template', ['title' => 'Home Page']) ?>

<div class="jumbotron">
    <div class="row heite">
        <div class="col-md-6 d-flex align-items-stretch">
            <div class="card shadow-sm">
                <div class="card-header bg-dark"><h3 class="text-center text-light">Poker Technical Test</h3></div>
                <div class="card-body">
                    <h4 class='card-title'>Description:</h4>
                    <p class="card-text">Web application should calculate chance of getting desired card based on the amount of cards left.
                        Use string notation to designate cards.</p>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-end align-items-center">
                        <div class="btn-group">
                            <a href="<?php echo Router::getNamedRoute('PokerIndex')->getPath();?>" class="btn btn-md btn-outline-secondary">Test</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 d-flex align-items-stretch">
            <div class="card shadow-sm">
                <div class="card-header bg-dark"><h3 class="text-center text-light">Analyzer Technical Test</h3></div>
                <div class="card-body">
                    <h4 class='card-title'>Description:</h4>
                    <p class="card-text">Create a web application that will analyze customer input and provide some statistics.</p>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-end align-items-center">
                        <div class="btn-group">
                            <a href="<?php echo Router::getNamedRoute('AnalyzerIndex')->getPath();?>" class="btn btn-md btn-outline-secondary">Test</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-header bg-dark"><h3 class="text-center text-light">Documentation</h3></div>
                <div class="card-body">
                    <p class="card-text"><?php echo markDown('readme', true);?></p>
                </div>
            </div>
        </div>
    </div>
</div>
