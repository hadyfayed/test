<?php $this->layout('template', ['title' => 'String Analyzer']) ?>
<div class="jumbotron">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-header bg-dark"><h3 class="text-center text-light">Analyzer</h3></div>
                <div class="card-body">
                    <form method="POST" action="/analyze">
                        <div class="form-group">
                            <label for="text">Phrase</label>
                            <textarea class="form-control" id="phrase" name="phrase" placeholder="Enter Your Phrase"><?php if(isset($phrase)) echo $phrase?></textarea>
                            <?php if(isset($error)){
                                echo '<div class="alert alert-danger mt-1" role="alert">
                                '.$error.'
                            </div>';
                            }?>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php if(isset($report)):?>
    <table class="table table-light table-striped mt-5">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Symbol</th>
            <th scope="col">Count</th>
            <th scope="col">Before</th>
            <th scope="col">After</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($report as $row){
            echo '<tr>';
            echo '<td>'.$row['value'].'</td>';
            echo '<td>'.$row['count'].'</td>';
            echo '<td>'.collect($row['before'])->implode(', ').'</td>';
            echo '<td>'.collect($row['after'])->implode(', ').'</td>';
            echo '</tr>';
        }
        ?>
        </tbody>
    </table>
    <?php endif;?>
    <div class="row mt-5">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-header bg-dark"><h3 class="text-center text-light">Documentation</h3></div>
                <div class="card-body">
                    <p class="card-text"><?php echo markDown('analyzer', true);?></p>
                </div>
            </div>
        </div>
    </div>
</div>