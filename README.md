# API Documentation

Following are the endpoints and resulting json formats

## Subjects

Use the following format to retrieve all subjects

```
https://bcsc.abunooh.com/api/subjects
```

***Result***

```json
[
    {
        "id": 1,
        "name": "Advanced Networking and Telecommunications",
        "code": "CPT229",
        "lecturer": "Thoriq",
        "created_at": "2021-09-02T08:44:00.000000Z",
        "updated_at": "2021-09-02T08:44:00.000000Z",
        "description": null
    }
]
```

Use the following format to retrieve a specific subject using its code (example to retrieve subject with code **CPT241**). Currently subjects can be filtered by code only.

```
https://bcsc.abunooh.com/api/subjects?filter[code]=CPT241
```

Resulting *JSON* format will remain the same as above example.



## Periods

Use the following format to retrieve all periods

```
https://bcsc.abunooh.com/api/periods
```

***Result***

```json
[
    {
        "id": 1,
        "subject_id": 1,
        "start_at": "18:00:00",
        "end_at": "20:00:00",
        "weekday": "sunday",
        "details": null,
        "created_at": "2021-09-02T08:45:32.000000Z",
        "updated_at": "2021-09-05T13:11:41.000000Z",
        "location": "Q3-09 (Lab-30)"
    }
]
```

Use the following to retrieve a specific period using its id, subject id or weekday

```
https://bcsc.abunooh.com/api/periods?filter[weekday]=thursday
https://bcsc.abunooh.com/api/periods?filter[id]=8
https://bcsc.abunooh.com/api/periods?filter[subject_id]=1
```

The expecting json format will remain the same as above.

You may also retrieve the data of corresponding subjects with the periods by adding **include=subject**

```
https://bcsc.abunooh.com/api/periods?include=subject
```

The resulting *JSON* will be as follows

```json
[
    {
        "id": 1,
        "subject_id": 1,
        "start_at": "18:00:00",
        "end_at": "20:00:00",
        "weekday": "sunday",
        "details": null,
        "created_at": "2021-09-02T08:45:32.000000Z",
        "updated_at": "2021-09-05T13:11:41.000000Z",
        "location": "Q3-09 (Lab-30)",
        "subject": {
            "id": 1,
            "name": "Advanced Networking and Telecommunications",
            "code": "CPT229",
            "lecturer": "Thoriq",
            "created_at": "2021-09-02T08:44:00.000000Z",
            "updated_at": "2021-09-02T08:44:00.000000Z",
            "description": null
        }
    }
]
```

You may mix parameters to change the output json as you require.



## Assessments

Assessments can also be filtered using the below format

```
https://bcsc.abunooh.com/api/assessments
```

Assesments can also be filtered by its **id**, **subject_id** and **type** and can query its respective subject using the **include=subject**.



## Author

- [abunooh](https://abunooh.com)