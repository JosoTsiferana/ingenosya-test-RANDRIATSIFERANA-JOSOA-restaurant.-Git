import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Ingredients } from '../Model/Ingredients';
import { Observable } from  'rxjs';

@Injectable({

  providedIn: 'root'
})
export class IngredientsService {

  PHP_API_SERVER = "http://127.0.0.1:8000";
  constructor(private httpClient: HttpClient){}

  readPolicies(): Observable<Ingredients[]>{
    return this.httpClient.get<Ingredients[]>(`${this.PHP_API_SERVER}/ingredients`);
  }
  createPolicy(Ingredients: Ingredients): Observable<Ingredients>{
    return this.httpClient.post<Ingredients>(`${this.PHP_API_SERVER}/ingredients/action/post`, Ingredients);
  }
  
}
