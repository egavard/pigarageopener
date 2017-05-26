Simple project allowing to control relay from a Raspberry written in PHP and using wiringpi.

Sources are pretty simple. An index.php page hosts a materializecss frontend that allows users to trigger opening or closing of the door.

Each button push triggers an Ajax request to an exec.php page.
This exec page calls directly wiring by the way of exec instruction.


These relays allow current to open or close an electric garage door.

As show by the following schema, only two GPIO pins are needed in our case (plus 5V and GND pins).
Our garage door motor provides us two wires were the current flows, one for open the gate, the other to close the gate.
The motor has its own neutral.

![Electrical Schema](pigarage.png)
