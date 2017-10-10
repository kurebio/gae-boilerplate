package main

import (
	"encoding/json"
	"net/http"
	"os"

	"google.golang.org/appengine"
	"google.golang.org/appengine/log"
)

type (
	APIResult struct {
		ProjectID string              `json:"project_id"`
		URL       string              `json:"url"`
		Query     map[string][]string `json:"query"`
	}
)

func init() {
	http.HandleFunc("/api/", APIHandler)
}

func APIHandler(w http.ResponseWriter, r *http.Request) {
	w.Header().Set("Access-Control-Allow-Origin", "*")

	ctx := appengine.NewContext(r)
	if appengine.IsDevAppServer() {
		log.Infof(ctx, "DEV")
	} else {
		log.Infof(ctx, "PROD")
	}
	log.Infof(ctx, "API was called.")

	query := r.URL.Query()

	res := APIResult{os.Getenv("PROJECT_ID"), r.URL.Path, query}
	j, err := json.Marshal(res)
	if err != nil {
		w.WriteHeader(500)
		return
	}

	w.Header().Set("Content-Type", "application/json; charset=UTF-8")
	w.WriteHeader(200)
	w.Write(j)
}
