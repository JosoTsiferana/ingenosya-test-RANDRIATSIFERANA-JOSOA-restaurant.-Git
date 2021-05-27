import { ComponentFixture, TestBed } from '@angular/core/testing';

import { IndredientListeComponent } from './indredient-liste.component';

describe('IndredientListeComponent', () => {
  let component: IndredientListeComponent;
  let fixture: ComponentFixture<IndredientListeComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ IndredientListeComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(IndredientListeComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
