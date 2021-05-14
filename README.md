# IST4310

Team Members

Moreno, Oscar
Samra, Arjun

Description of Website
Our website will be a single-page web application that acts as a cost of living
comparison calculator. On a basic level, users can input their total income and the site
will calculate the cost of living comparison between the two states. Users will be shown
a drop-down selection of their current state and the state they are comparing to.

Resources
We will be basing our calculations on official government statistics that have already
computed the composite cost of living index for Quarter 4 2020. Gathered from cities
across the nation that participated in the Council for Community & Economic Research
survey on a volunteer basis.
https://meric.mo.gov/data/cost-living-data-series

Technology Stack
Linux, Apache, MySql, PHP(LAMP)

The web page will be hosted on Apache running on Debian. The frontend will be written
in PHP, manipulating the data inputted by the user by retrieving the state’s Cost Index
from a MySQL database and running it against the user’s Desired Location Cost Index
using the formula below
Component structure for your PHP frontend.
The component structure of the frontend will include user input from their current salary and their current location will be selected via a
drop-down menu. Then the user will select their desired location through a drop-down menu to discover what their equivalent salary would be.
In addition, there will be a button for the user to press to calculate the new salary. This will be set up through HTML and submitted via a
POST request, which will then be used by our PHP file to display the new Salary. This will essentially be calculated by finding the difference
between the current locations cost index and the new locations cost index and multiplying it against the user's salary. This will then result
in the new location’s salary with the adjusted cost of living as a factor.
Pseudo-code
currentstate = POST(currentstate)
desiredstate = POST(desiredstate)
userSalary = POST(salary)
currentCI = mysql_fetch(currentstate)
newCI = mysql_fetch(desiredstate)
if
newSalary = userSalary(
(
(newCI-currentCI)/100)+1)
echo "This is the Salary" . newSalary . "!
!"
Document structure of your MySQL backend.
MySQL backend will include the metric cost of living from the research gathered from the Missouri Economic Research and Information Center.
Including every State and its cost index. The table will include several items/rows as States and their columns/values as the cost index.
