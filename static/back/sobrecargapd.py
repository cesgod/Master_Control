#!/usr/bin/env python3
from ast import IsNot
from zeep import Client
from zeep import xsd
from datetime import date, datetime, timedelta
import json
import re

wsdl = "http://clvmweb.clyfsa.com:81/SEP2WebServices/ManagementService.svc?singleWsdl"
client = Client(wsdl)

request_data ={
    "groupReference": {
      "Name": "PDS PUBLICOS Activos",
    }
  }
response = client.service.QueryGroupMembers(**request_data)
#print (response)
#Here 'request_data' is the request parameter dictionary.
#Assuming that the operation named 'sendData' is defined in the passed wsdl. 

#print (response)
lim = len(response["Devices"]["DeviceReference"])
alldvcs=[]
alldvcsn=[]
print(lim)
#lim=20
#def myconverter(o):
#    if isinstance(o, datetime.datetime):
#        return o.__str__()
#todayn = datetime.today()
#day1=todayn.strftime("%Y-%m-%d")
#day2=(todayn - timedelta(days=15)).strftime("%Y-%m-%d")
#day1 = str(day1)+"T00:00:00"
#day2 = str(day2)+"T00:00:00" 
with open('/var/www/html/app/static/datepd.json', 'r') as f:
    rangeib = json.load(f)
nlim=len(rangeib)
for i in range(nlim):
    day = (rangeib['Ntime'])
#day1=day1.strftime("%Y-%m-%d")
day = datetime.strptime(day, '%Y-%m-%d')
day1 = (day).strftime("%Y-%m-%d")
print('Day 1:' ,day1)

day2 = (day - timedelta(days=15)).strftime("%Y-%m-%d")

#day2=(todayn - timedelta(days=15)).strftime("%Y-%m-%d")
day1 = str(day1)+"T00:00:00"
day2 = str(day2)+"T00:00:00" 

ddd=0
for x in range (lim):
	#print(response["Devices"]["DeviceReference"][x]["Name"])  
	#print(x)
	#ddd=ddd+1
	#print(ddd)
	arequest_data ={
        "deviceReference": {
          "Name": response["Devices"]["DeviceReference"][x]["Name"],
        },
        "queryAll": "false",
        "attributeReferences": {
          "AttributeReferencesByGroup": [
            {
              "AttributeGroupType": "DeviceParameters",
              "AttributeReferences": {
                "AttributeReference": {
                  "Name": "Transformador(KVA)"
                }
              },
              "AllAttributes": "false"
            },
            {
              "AttributeGroupType": "DeviceParameters",
              "AttributeReferences": {
                "AttributeReference": {
                  "Name": "Alimentador"
                }
              },
              "AllAttributes": "false"
            },
            {
              "AttributeGroupType": "DeviceParameters",
              "AttributeReferences": {
                "AttributeReference": {
                  "Name": "PD"
                }
              },
              "AllAttributes": "false"
            },
            {
              "AttributeGroupType": "DeviceParameters",
              "AttributeReferences": {
                "AttributeReference": {
                  "Name": "Numero de medidor"
                }
              },
              "AllAttributes": "false"
            },
            {
              "AttributeGroupType": "DeviceParameters",
              "AttributeReferences": {
                "AttributeReference": {
                  "Name": "Barrio"
                }
              },
              "AllAttributes": "false"
            },
            {
              "AttributeGroupType": "DeviceParameters",
              "AttributeReferences": {
                "AttributeReference": {
                  "Name": "SuccessfulLastDateTime"
                }
              },
              "AllAttributes": "false"
            }
          ]
        }
      }
	#aresponse = client.service.QueryDeviceAttributes(**arequest_data)
	bwsdl = "http://clvmweb.clyfsa.com:81/SEP2WebServices/DataService.svc?singleWsdl"
	bclient = Client(bwsdl)

	brequest_data ={
	    "measurementPointResultTypes": {
	      "MeasurementPointResultTypeReferences": {
	        "MeasurementPointName": response["Devices"]["DeviceReference"][x]["Name"],
	        "AgencyId": "0",
	        "ResultTypeNames":  "ActivePowerComb(|+A|+|-A|)_INST_LP1",
	        
	      }
	    },
	    "intervalStart": day2,
	    "intervalEnd": day1,
	    "statusFilter": "null",
	    "sourceFilter": {
	      "Measured": "true",
	      "Manual": "false",
	      "Aggregated": "false",
	      "Imported": "false",
	      "Estimated": "false"
	    },
	    "resultOrigin": "PreferRaw",
	    "lastResultOnly": "false"
	  }

	#bresponse = bclient.service.QueryResults(**brequest_data)
	crequest_data ={
	    "measurementPointResultTypes": {
	      "MeasurementPointResultTypeReferences": {
	        "MeasurementPointName": response["Devices"]["DeviceReference"][x]["Name"],
	        "AgencyId": "0",
	        "ResultTypeNames": "Voltage_L1_INST_LP2"
	      }
	    },
	    "intervalStart": day2,
	    "intervalEnd": day1,
	    "statusFilter": "null",
	    "sourceFilter": {
	      "Measured": "true",
	      "Manual": "false",
	      "Aggregated": "false",
	      "Imported": "false",
	      "Estimated": "false"
	    },
	    "resultOrigin": "PreferRaw",
	    "lastResultOnly": "true"
	  }

	#cresponse = bclient.service.QueryResults(**crequest_data)
	drequest_data ={
	    "measurementPointResultTypes": {
	      "MeasurementPointResultTypeReferences": {
	        "MeasurementPointName": response["Devices"]["DeviceReference"][x]["Name"],
	        "AgencyId": "0",
	        "ResultTypeNames": "Voltage_L2_INST_LP2"
	      }
	    },
	    "intervalStart": day2,
	    "intervalEnd": day1,
	    "statusFilter": "null",
	    "sourceFilter": {
	      "Measured": "true",
	      "Manual": "false",
	      "Aggregated": "false",
	      "Imported": "false",
	      "Estimated": "false"
	    },
	    "resultOrigin": "PreferRaw",
	    "lastResultOnly": "true"
	  }
	#dresponse = bclient.service.QueryResults(**drequest_data)
	#alldvcs.append(cresponse)
	erequest_data ={
	    "measurementPointResultTypes": {
	      "MeasurementPointResultTypeReferences": {
	        "MeasurementPointName": response["Devices"]["DeviceReference"][x]["Name"],
	        "AgencyId": "0",
	        "ResultTypeNames": "Voltage_L3_INST_LP2"
	      }
	    },
	    "intervalStart": day2,
	    "intervalEnd": day1,
	    "statusFilter": "null",
	    "sourceFilter": {
	      "Measured": "true",
	      "Manual": "false",
	      "Aggregated": "false",
	      "Imported": "false",
	      "Estimated": "false"
	    },
	    "resultOrigin": "PreferRaw",
	    "lastResultOnly": "true"
	  }
	aresponse = client.service.QueryDeviceAttributes(**arequest_data)
	bresponse = bclient.service.QueryResults(**brequest_data)
	cresponse = bclient.service.QueryResults(**crequest_data)
	dresponse = bclient.service.QueryResults(**drequest_data)
	eresponse = bclient.service.QueryResults(**erequest_data)
	#print(bresponse)
	print(response["Devices"]["DeviceReference"][x]["Name"])
	alldvcs.append({'MeterName':response["Devices"]["DeviceReference"][x]["Name"]})
	alldvcs[x]["Potencia Nominal"]=aresponse[0]['Attributes']['AttributeInfo'][0]['Value']['Value']
	alldvcs[x]["Alimentador"]=aresponse[0]['Attributes']['AttributeInfo'][1]['Value']['Value']
	alldvcs[x]["PD"]=aresponse[0]['Attributes']['AttributeInfo'][2]['Value']['Value']
	txt=aresponse[0]['Attributes']['AttributeInfo'][2]['Value']['Value']
	txt=re.sub(r"\D", "", txt)
	alldvcs[x]["Codigo"]=txt
	#alldvcs[x]["Codigo"]=float(aresponse[0]['Attributes']['AttributeInfo'][2]['Value']['Value'])
	alldvcs[x]["Barrio"]=aresponse[0]['Attributes']['AttributeInfo'][4]['Value']['Value']
	#print(bresponse[0].ResultsByResultType.ResultTypeResults[0].Results.Result)
	if bresponse is not None:
		if bresponse[0].ResultsByResultType.ResultTypeResults[0].Results is not None:
			#print(bresponse[0])
			nlim=len(bresponse[0].ResultsByResultType.ResultTypeResults[0].Results.Result)
			#print(nlim)
			#print(int(s) for s in txt.split() if s.isdigit())
			#alldvcs[x]["Potencia"] =

	for j in range(nlim):
		#print(j)
		if bresponse is not None:
			if bresponse[0].ResultsByResultType.ResultTypeResults[0].Results is not None:
				print(bresponse[0]['ResultsByResultType']['ResultTypeResults'][0]['Results']['Result'][j]['Value']['Value'])
				#if type(bresponse[0]['ResultsByResultType']['ResultTypeResults'][0]['Results']['Result'][j]['Value']['Value']) is not str:
				if float(bresponse[0]['ResultsByResultType']['ResultTypeResults'][0]['Results']['Result'][j]['Value']['Value']) > (float(aresponse[0]['Attributes']['AttributeInfo'][0]['Value']['Value']) * 0.6):
					alldvcsn.append((bresponse[0]['ResultsByResultType']['ResultTypeResults'][0]['Results']['Result'][j]['Timestamp'] - timedelta(hours=3)).strftime("%d-%m-%Y %H:%M"))
					alldvcsn.append(bresponse[0]['ResultsByResultType']['ResultTypeResults'][0]['Results']['Result'][j]['Value']['Value'])
					#alldvcsn[j] = bresponse[0]['ResultsByResultType']['ResultTypeResults'][0]['Results']['Result'][j]['Timestamp'].strftime("%d-%m-%Y %H:%M")
					#alldvcsn[j] = bresponse[0]['ResultsByResultType']['ResultTypeResults'][0]['Results']['Result'][j]['Value']['Value']
					#alldvcsn[2] = bresponse[0]['ResultsByResultType']['ResultTypeResults'][0]['Results']['Result'][2]['Value']['Value']
					#alldvcsn.append({'MeterName':bresponse[0]['ResultsByResultType']['ResultTypeResults'][0]['Results']['Result'][j]['Timestamp'].strftime("%d-%m-%Y %H:%M")})
	alldvcs[x]["Potencia"] = alldvcsn
	alldvcsn=[]
	#alldvcs.append(aresponse[0]['Attributes']['AttributeInfo'][5]['Value']['Value'])
	#alldvcs.append(bresponse)
	#alldvcs.append(cresponse)
	#alldvcs.append(dresponse)
	#alldvcs.append(eresponse)
	#print(x)
	#print(response["Devices"]["DeviceReference"][x]["Name"])
	#print(aresponse, bresponse, cresponse, dresponse, eresponse)
	
	
	#dateasd= str(bresponse[0]['ResultsByResultType']['ResultTypeResults'][0]['Results']['Result'][0]['Timestamp'])
	#alldvcs.append(dateasd)
	#print (alldvcs)
	#print(bresponse[0]["ResultsByResultType"]["ResultTypeResults"][0]["Results"]["Result"][0]["Value"]["Value"])
	#ele = (input("Name : ")) 
    #d = json.loads(s) 36
print (alldvcs)

with open('/var/www/html/app/static/back/sobrecargapd.json', 'w', encoding='utf-8') as f:
    json.dump(alldvcs, f, ensure_ascii=False, indent=4)

	# prints [1,3,5]    
#aresponse = aclient.service.QueryDeviceAttributes(**raequest_data)

#print (alldvcs)
