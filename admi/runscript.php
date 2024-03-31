<?php
$title = "Script Execution";
require_once $_SERVER['DOCUMENT_ROOT'] . '/config/main.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/SOAP.php';

$userclass = new User;

$adminlevel = 0;

if (isset($_SESSION["user"])) {
    $user = $userclass::getUser($_SESSION["user"]["id"]);
    $adminlevel = $user["admin"];

    if ($adminlevel < 3) {
        $title = "Forbidden";
        require_once $_SERVER["DOCUMENT_ROOT"] . "/403.php";
        exit;
    }
} else {
    $title = "Forbidden";
    require_once $_SERVER["DOCUMENT_ROOT"] . "/403.php";
    exit;
}

$placeId = isset($_GET["placeId"]) ? $_GET["placeId"] : 0;


$jobClass = new Jobs;
$jobs = $jobClass->getAllJobsForPlaceId($placeId);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $jobId = $_POST["jobid"];
    $jobId2 = $_POST["jobid2"];
    $script = $_POST["script"];
    $jobtype = $_POST["jobtype"];

    if (!empty($jobId2)) {
        $jobId = $jobId2;
    }

    $RCCServiceSoap = new Roblox\Grid\Rcc\RCCServiceSoap();

    if ($jobtype == "newjob") {
        $job = new Roblox\Grid\Rcc\Job($jobId);
        $script = new Roblox\Grid\Rcc\ScriptExecution($jobId . "-Script", $script);
        $value = $RCCServiceSoap->OpenJobEx($job, $script);
    } elseif ($jobtype == "existingjob") {
        $script = new Roblox\Grid\Rcc\ScriptExecution($jobId . "-Script", $script);
        $value = $RCCServiceSoap->ExecuteEx($jobId, $script);
    }
}

?>

<?php echo PageBuilder::buildHeader(); ?>
<?php echo PageBuilder::buildAdminNavbar(); ?>

<div class="content">
    <h3>RCCService Script Execution</h3>
    <p>Here you can create new jobs and queue high level luau script execution.</p>
    <p>You can also execute luau scripts on already existsing jobs. (Like game instances)</p>
    <form method="post">
        <b>
            <p><label for="script">Script:</label></p>
            <textarea name="script" id="script" cols="80" rows="10"></textarea>
        </b>

        <p>
            <input type="submit" name="submit" value="Run Script">
        </p>





        <label for="jobid">Job ID:</label>
        <select name="jobid" id="jobid">
            <?php foreach ($jobs as $job) { ?>
                <option value="<?= $job["jobId"] ?>"><?= $job["jobId"] ?></option>
            <?php } ?>
        </select>

        <p>
            <label for="jobid2">Job ID (Manual):</label>
            <input name="jobid2" id="jobid2"></input>
        </p>

        <p>
            <input type="radio" name="jobtype" id="newjob" value="newjob" checked="checked">
            <label for="newjob">Run as a new job</label>
            <input type="radio" name="jobtype" id="existingjob" value="existingjob">
            <label for="existingjob">Run on an existing job</label>
        </p>
    </form>
    <form method="GET">
        <label for="placeId">Place ID:</label>
        <input type="number" name="placeId" id="placeId" value="<?= $placeId ?>" />
        <input type="submit" value="Go" />
    </form>
</div>

<?php echo PageBuilder::buildFooter(); ?>