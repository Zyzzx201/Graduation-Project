package com.example.mac.gradproj2;

import android.app.AlertDialog;
import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.EditText;
import android.widget.Toast;

public class MainActivity extends AppCompatActivity {
    EditText username,password,email,confpass;
    AlertDialog alertDialog;

    @Override
    protected void onCreate(Bundle savedInstanceState) {

        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        username = (EditText)findViewById(R.id.ET_username);
        password = (EditText)findViewById(R.id.ET_pass);
        email =  (EditText)findViewById(R.id.ET_email);
        confpass = (EditText)findViewById(R.id.ET_confpass);
        alertDialog = new AlertDialog.Builder(MainActivity.this).create();
        alertDialog.setTitle("ERROR");
    }
    public void onReg(View view) {
        String str_name = username.getText().toString();
        String str_password = password.getText().toString();
        String str_confpass = confpass.getText().toString();
        String str_email = email.getText().toString();
        String type = "register";
        if(str_name.isEmpty())
        {
            alertDialog.setMessage("User Name IS Empty");
            alertDialog.show();
        }
        else if(str_password.isEmpty())
        {
            alertDialog.setMessage("Password IS Empty");
            alertDialog.show();
        }
        else if(str_email.isEmpty())
        {
            alertDialog.setMessage("Email IS Empty");
            alertDialog.show();
        }
        else if(!str_password.equals(str_confpass))
        {
            alertDialog.setMessage("Password And Confirm Password Not Equals");
            alertDialog.show();
        }
        else
        {
            BackgroundWorker backgroundWorker = new BackgroundWorker(this);
            backgroundWorker.execute(type, str_name, str_password, str_email);
            Toast.makeText(getApplicationContext(), "Register successfully", Toast.LENGTH_SHORT).show();
            Intent ret = new Intent(MainActivity.this, Login.class);
            //ret.putExtra("username", str_name);
            startActivity(ret);
        }
    }

    public void login(View view)
    {
        Intent ret = new Intent(MainActivity.this, Login.class);
        startActivity(ret);
    }
}
