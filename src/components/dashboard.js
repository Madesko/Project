import React from 'react';
import Card from '@material-ui/core/Card';
import CardContent from '@material-ui/core/CardContent';
import CardHeader from '@material-ui/core/CardHeader';

export default () => (
  <Card>
    <CardHeader title='Добро пожаловать, username' />
    <CardContent>Доступные функции отображены слева!</CardContent>
  </Card>
);