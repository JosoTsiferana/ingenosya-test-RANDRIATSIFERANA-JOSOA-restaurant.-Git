import { Component, OnInit } from '@angular/core';
import { IngredientsService } from './../Service/ingredients.service';
import { Ingredients } from '../Model/Ingredients';

@Component({
  selector: 'app-indredient-liste',
  templateUrl: './indredient-liste.component.html',
  styleUrls: ['./indredient-liste.component.css']
})
export class IndredientListeComponent implements OnInit {

  ingredients: Ingredients[] = [];
  // selectedPolicy:  Ingredients  = { id: null , number:null, amount:  null};
  error: string = '';

  constructor(private ingredientsService: IngredientsService) { }

  ngOnInit(): void {
    this.ingredientsService.readPolicies().subscribe((ingredients: Ingredients[])=>{
      this.ingredients = ingredients;
      console.log(this.ingredients);
    })
  }


  createOrUpdatePolicy(form){

    this.ingredientsService.createPolicy(form.value).subscribe((policy: Ingredients)=>{
      console.log("Policy created, ", policy);
    });

  }
  

}
