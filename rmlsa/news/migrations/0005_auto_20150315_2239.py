# -*- coding: utf-8 -*-
from __future__ import unicode_literals

from django.db import models, migrations


class Migration(migrations.Migration):

    dependencies = [
        ('news', '0004_auto_20150315_2233'),
    ]

    operations = [
        migrations.AlterField(
            model_name='articleimage',
            name='name',
            field=models.CharField(default='article_image_2015-03-15 22:39:01.946185', max_length=50),
            preserve_default=True,
        ),
    ]
