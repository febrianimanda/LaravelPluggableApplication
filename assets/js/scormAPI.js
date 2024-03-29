/*

VS SCORM - RTE API FOR SCORM 1.2 
Rev 1.0 - Sunday, May 31, 2009
Copyright (C) 2009, Addison Robson LLC

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, 
Boston, MA  02110-1301, USA.

*/

var debug = true;

// ------------------------------------------
//   SCORM RTE Functions - Initialization
// ------------------------------------------
function LMSInitialize(dummyString) { 
  if (debug) { alert('*** LMSInitialize ***'); }
  return "true";
}

// ------------------------------------------
//   SCORM RTE Functions - Getting and Setting Values
// ------------------------------------------
function LMSGetValue(varname) {
  if (debug) { 
    alert('*** LMSGetValue varname='+varname
                          +' varvalue=value ***');
  }
  return "value";
}

function LMSSetValue(varname,varvalue) {
  if (debug) { 
    alert('*** LMSSetValue varname='+varname
                          +' varvalue='+varvalue+' ***');
  }
  return "true";
}

function LMSCommit(dummyString) {
  if (debug) { alert('*** LMSCommit ***'); }
  return "true";
}

// ------------------------------------------
//   SCORM RTE Functions - Closing The Session
// ------------------------------------------
function LMSFinish(dummyString) {
  if (debug) { alert('*** LMSFinish ***'); }
  return "true";
}

// ------------------------------------------
//   SCORM RTE Functions - Error Handling
// ------------------------------------------
function LMSGetLastError() {
  if (debug) { alert('*** LMSGetLastError ***'); }
  return 0;
}

function LMSGetDiagnostic(errorCode) {
  if (debug) { 
    alert('*** LMSGetDiagnostic errorCode='+errorCode+' ***');
  }
  return "diagnostic string";
}

function LMSGetErrorString(errorCode) {
  if (debug) { 
    alert('*** LMSGetErrorString errorCode='+errorCode+' ***'); 
  }
  return "error string";
}
