package com.example.mac.gradproj2;

import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.EditText;

public class Login extends AppCompatActivity {
    EditText username,password;
    String uid;

    @Override
    protected void onCreate(Bundle savedInstanceState) {

        super.onCreate(savedInstanceState);
        setContentView(R.layout.login);
        //value from another form
        //Bundle bd= getIntent().getExtras();
        //username1= bd.getString("username");
        username = (EditText)findViewById(R.id.ET_username);
        password = (EditText)findViewById(R.id.ET_pass);
    }

    public void onlog(View view) {
        String str_name = username.getText().toString();
        String str_password = password.getText().toString();
        String type = "login";
        BackgroundWorker2 backgroundWorker = new BackgroundWorker2(this,this);
        backgroundWorker.execute(type,str_name,str_password);
        //System.err.println("user id"+uid);
        //Toast.makeText(getApplicationContext(),uid, Toast.LENGTH_SHORT).show();

    }
    public void image(String id)
    {
        uid = id;
        Intent ret = new Intent(Login.this, Image.class);
        ret.putExtra("u_id", uid);
        startActivity(ret);
    }

    public void onReg(View view)
    {
        Intent ret = new Intent(Login.this, MainActivity.class);
        startActivity(ret);
    }

    public void onsel(View view)
    {
        Intent ret = new Intent(Login.this, MapsActivity.class);
        startActivity(ret);
    }
}
