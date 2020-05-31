<?php include 'inc/header.php'; ?>

<div class="jumbotron">
    <h1 class="display-3">Find a Job</h1>
    <form method="GET" action="index.php">
        <select name="category" class="form-control">
            <option value="0">Choose Category</option>
            <?php foreach ($categories as $category) : ?>
                <option value="<?php echo $category->Id; ?>"
                ><?php echo $category->name; ?></option>
            <?php endforeach; ?>
        </select>
        <br>
        <input type="submit" class="btn btn-lg btn-success mt-3" value="FIND">
    </form>
</div>

<h3><?php echo $title; ?></h3>

<?php foreach ($jobs as $job) : ?>
    <div class="row marketing">
        <div class="col-md-10">
            <h4><?php echo $job->job_title; ?></h4>
            <p><?php echo $job->description; ?></p>
        </div>
        <div class="col-md-2">
            <a href="job.php?id=<?php echo $job->Id; ?>" class="btn btn-primary">View</a>
        </div>
    </div>
<?php endforeach; ?>

<?php include 'inc/footer.php'; ?>