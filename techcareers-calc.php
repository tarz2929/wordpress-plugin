<?php 
/**
 * Plugin Name:       TECHCareers Calculator
 * Plugin URI:        
 * Description:       Simple php calculator
 * Version:           1.0
 * Requires at least: 5
 * Requires PHP:      7.4
 * Author:            Tarun Mulle
 * Author URI:       
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 */

 add_shortcode();

 function techCareersCalculator ()
{
  // Set result to false so we can check later if it should be output.
  $result = FALSE;
  if ( !empty( $_POST ) ) // Check if there are any values in our array!
  { // We need to do a different math operation depending on submission...
    switch ( $_POST['op'] )
    { // A case for each possible <option> in our form...
      case 'addition':
        $opSymbol = '+';
        $result = $_POST['value1'] + $_POST['value2'];
        break;
      case 'subtraction':
        $opSymbol = '-';
        $result = $_POST['value1'] - $_POST['value2'];
        break;
      case 'multiplication':
        $opSymbol = '&times;';
        $result = $_POST['value1'] * $_POST['value2'];
        break;
      case 'division':
        $opSymbol = '&divide;';
        $result = $_POST['value1'] / $_POST['value2'];
        break;
    }
  }
  ?>
  <form method="POST" action="#">
    <label for="num1">
      Enter first operand:
      <input
        id="num1"
        name="value1"
        type="number"
        value="">
    </label>
    <label for="operator">
      Select an operator:
      <select id="operator" name="op">
        <option value="addition">
          +
        </option>
        <option value="subtraction">
          -
        </option>
        <option value="multiplication">
          &times;
        </option>
        <option value="division">
          &divide;
        </option>
      </select>
    </label>
    <label for="num2">
      Enter second operand:
      <input
        id="num2"
        name="value2"
        type="number"
        value="">
    </label>
    <input type="submit" value="Calculate!">
  </form>

  <?php if ( $result != FALSE ) : // Only output if there is a valid result. ?>
    <p>
      Your result for your calculation is:
      <?php echo $result; ?>
    </p>
  <?php endif;
}