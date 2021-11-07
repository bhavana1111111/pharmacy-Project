<?php
namespace Phppot;

use Phppot\CountryState;
if (! empty($_POST["category"])) {
    
    $countryId = $_POST["category"];
    
    require_once __DIR__ . '/../Model/CountryStateCity.php';
    $countryStateCity = new CountryStateCity();
    $stateResult = $countryStateCity->getStateByCountrId($countryId);
    ?>
<option value="">Select State</option>
<?php
    foreach ($stateResult as $state) {
        ?>
<option value="<?php echo $state["p_cat_id"]; ?>"><?php echo $state["p_cat_title"]; ?></option>
<?php
    }
}
?>