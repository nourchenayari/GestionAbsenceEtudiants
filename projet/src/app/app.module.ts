import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { NavbarComponent } from './SharePage/navbar/navbar.component';
import { FooterComponent } from './SharePage/footer/footer.component';


@NgModule({
  declarations: [
    NavbarComponent,FooterComponent
  ],
  imports: [
    BrowserModule,NavbarComponent,FooterComponent ,
    AppRoutingModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
