import React from 'react';
import { List, Edit, Create, SimpleForm, TextInput, Datagrid, TextField, EmailField } from 'react-admin';

export const UserList = props => (
   <List {...props}>
       <Datagrid rowClick="edit">
           <TextField source="id" />
           <TextField source="name" />
           <TextField source="username" />
           <EmailField source="email" />
           <TextField source="subdivision" label="Подразделение" />
		   <TextField source="post" label="Должность" />
       </Datagrid>
   </List>
);

export const UserCreate = props => (
   <Create {...props}>
       <SimpleForm>
		   <TextInput source="name" />
           <TextInput source="username" />
           <EmailField source="email" />
           <TextInput source="subdivision" label="Подразделение" />
		   <TextInput source="post" label="Должность" />
       </SimpleForm>
   </Create>
);

export const UserEdit = props => (
   <Edit {...props}>
       <SimpleForm>
		   <TextInput source="name" />
           <TextInput source="username" />
           <EmailField source="email" />
           <TextInput source="subdivision" label="Подразделение" />
		   <TextInput source="post" label="Должность" />
       </SimpleForm>
   </Edit>
);