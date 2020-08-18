import React from 'react';
import {
   List,
   TextInput,
   SimpleForm,
   Edit,
   Create,
   ReferenceInput,
   SelectInput,
   Datagrid,
   ReferenceField,
   TextField,
   EmailField,
   EditButton,
   EditGuesser,
   Filter
} from 'react-admin';

const PostFilter = (props) => (
  <Filter {...props}>
    <TextInput label='Поиск' source='q' alwaysOn />
    <ReferenceInput label='Имя пользователя' source='userId' reference='users' allowEmpty>
      <SelectInput optionText='name' />
    </ReferenceInput>
  </Filter>
);

export const PostList = props => (
   <List filters={<PostFilter />} {...props}>
       <Datagrid rowClick="edit">
           <ReferenceField source="userId" reference="users"><TextField source="name"/></ReferenceField>
           <TextField source="id"/>
           <TextField source="title"/>
           <TextField source="body"/>
           <EditButton/>
       </Datagrid>
   </List>
);

export const PostEdit = props => (
   <Edit {...props}>
       <SimpleForm>
           <ReferenceInput source="userId" reference="users"><SelectInput optionText="id"/></ReferenceInput>
           <TextInput source="id"/>
           <TextInput source="title"/>
           <TextInput source="body"/>
       </SimpleForm>
   </Edit>
);

export const PostCreate = props => (
   <Create {...props}>
       <SimpleForm>
           <ReferenceInput source="userId" reference="users"><SelectInput optionText="id"/></ReferenceInput>
           <TextInput source="id"/>
           <TextInput source="title"/>
           <TextInput source="body"/>
       </SimpleForm>
   </Create>
);