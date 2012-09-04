My heart rate by d3.js

Using d3.js and a *.tcx file created whilst running.

I will take the datapoints "time" and "heartrate" to do something visual using d3.

I will document the steps.


#Clean the xml file.

I have removed:
* Author
* Creator
* LatitudeDegrees
* LongitudeDegrees

##Command to clean up the file
cat sample.tcx | grep -v 'Degrees' | grep -v 'AltitudeMeters' > sample.clean.tcx
