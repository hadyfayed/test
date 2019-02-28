<?php $this->layout('template', ['title' => 'Poker Chance Calculator']) ?>

<div class="jumbotron">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-header bg-dark"><h3 class="text-center text-light">Poker</h3></div>
                <div class="card-body">
                    <form method="POST" action="/poker">
                        <div class="form-group">
                            <label for="suit">Suit</label>
                            <select class="form-control" name="suit" id="suit">
                                <?php foreach ($suits as $key => $value): ?>
                                    <option value="<?php echo $key ?>"><?php echo $value ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="rank">Rank</label>
                            <select class="form-control" name="rank" id="rank">
                                <?php foreach ($ranks as $key => $value): ?>
                                    <option value="<?php echo $key ?>"><?php echo $value ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-header bg-dark"><h3 class="text-center text-light">Documentation</h3></div>
                <div class="card-body">
                    <p class="card-text"><?php echo markDown('poker', true);?></p>
                </div>
            </div>
        </div>
    </div>
</div>
