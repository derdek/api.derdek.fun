Minimal api doc

POST /api/upload
zip_codes : file.csv
```json
"success"
```

GET /api/zip/{zip code}
```json
{
    "id": 60,
    "zip": "00728",
    "lat": "18.00627000",
    "lng": "-66.66120000",
    "city": "Ponce",
    "state_id": "PR",
    "state_name": "Puerto Rico",
    "zcta": 1,
    "parent_zcta": "",
    "population": "39083",
    "density": "964.4",
    "county_fips": "72113",
    "county_name": "Ponce",
    "county_weights": "{\"72113\": \"100\"}",
    "county_names_all": "Ponce",
    "county_fips_all": "72113",
    "imprecise": 1,
    "military": 1,
    "timezone": "America/Puerto_Rico"
}
```
GET /api/city/{city name}
```json
{
    "id": 61,
    "zip": "00729",
    "lat": "18.33113000",
    "lng": "-65.88722000",
    "city": "Canovanas",
    "state_id": "PR",
    "state_name": "Puerto Rico",
    "zcta": 1,
    "parent_zcta": "",
    "population": "51015",
    "density": "580.0",
    "county_fips": "72029",
    "county_name": "Canóvanas",
    "county_weights": "{\"72029\": \"87.09\", \"72087\": \"12.91\"}",
    "county_names_all": "Canóvanas|Loíza",
    "county_fips_all": "72029|72087",
    "imprecise": 1,
    "military": 1,
    "timezone": "America/Puerto_Rico"
}
```
